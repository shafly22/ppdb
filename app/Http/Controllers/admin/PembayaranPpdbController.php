<?php

namespace App\Http\Controllers\Admin;

use App\Models\PembayaranPpdb;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranPpdbController extends Controller
{
    public function index()
    {
        $pembayaranPpdb = PembayaranPpdb::with('siswa')->latest()->get();
        return view('fe.admin.pembayaranppdb.index', compact('pembayaranPpdb'));
    }

    public function create()
    {
        $siswa = Siswa::all(); // Ambil semua siswa
        return view('fe.admin.pembayaranppdb.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tgl_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        PembayaranPpdb::create($request->all());

        return redirect()->route('fe.admin.pembayaranppdb.index')->with('message', 'Pembayaran PPDB berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = PembayaranPpdb::findOrFail($id);
        $siswa = Siswa::all();
        return view('fe.admin.pembayaranppdb.edit', compact('pembayaran', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tgl_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        $pembayaran = PembayaranPpdb::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('fe.admin.pembayaranppdb.index')->with('message', 'Pembayaran PPDB berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = PembayaranPpdb::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('fe.admin.pembayaranppdb.index')->with('message', 'Pembayaran PPDB berhasil dihapus.');
    }
}
