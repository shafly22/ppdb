<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PPDBController extends Controller
{
    // Menampilkan semua pendaftar
    public function index()
    {
        $pendaftar = Pendaftar::all();
        return view('fe.admin.ppdb.index', compact('pendaftar'));
    }

    // Menambahkan pendaftar
    public function create()
    {
        return view('fe.admin.ppdb.create'); // Form untuk menambah pendaftar
    }

    // Menyimpan pendaftar baru
    public function store(Request $request)
    {
        // Validasi dan simpan data
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
        
        ]);

        Pendaftar::create($validatedData);
        return redirect()->route('fe.admin.ppdb.index')->with('message', 'Pendaftar berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('fe.admin.ppdb.edit', compact('pendaftar'));
    }

    // Mengupdate pendaftar
    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            
        ]);

        $pendaftar->update($validatedData);
        return redirect()->route('fe.admin.ppdb.index')->with('message', 'Pendaftar berhasil diperbarui.');
    }

    // Menghapus pendaftar
    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();
        return redirect()->route('fe.admin.ppdb.index')->with('message', 'Pendaftar berhasil dihapus.');
    }  
}

