<?php

namespace App\Http\Controllers\Admin;

use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Pastikan untuk mengimpor Controller


class PembayaranSppController extends Controller
{
    public function index()
    {
        $pembayaranSpp = PembayaranSpp::with('siswa')->latest()->get();
        return view('fe.admin.pembayaranspp.index', compact('pembayaranSpp'));
    }

    public function create()
    {
        $siswa = Siswa::all(); // Ambil semua siswa
        return view('fe.admin.pembayaranspp.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tgl_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        // Menyimpan data pembayaran SPP ke dalam database
        PembayaranSpp::create([
            'siswa_id' => $request->siswa_id,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah' => $request->jumlah,
            'status' => $request->status
        ]);

        return redirect()->route('fe.admin.pembayaranspp.index')->with('message', 'Pembayaran SPP berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = PembayaranSpp::findOrFail($id);
        $siswa = Siswa::all();
        return view('fe.admin.pembayaranspp.edit', compact('pembayaran', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tgl_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        $pembayaran = PembayaranSpp::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('fe.admin.pembayaranspp.index')->with('message', 'Pembayaran SPP berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = PembayaranSpp::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('fe.admin.pembayaranspp.index')->with('message', 'Pembayaran SPP berhasil dihapus.');
    }
}
