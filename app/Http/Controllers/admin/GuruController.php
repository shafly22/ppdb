<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Pastikan untuk mengimpor Controller


class GuruController extends Controller
{
    function index()
    {
        return view('fe.admin.guru.index', [
            'guru' => Guru::latest()->get()
        ]);
    }
    function add()
    {
        return view('fe.admin.guru.insert');
    }
    function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'mata_pelajaran' => 'required',
            'alamat' => 'required'
        ]);

        Guru::create([
            'nama'=> $request->nama,
            'nip'=> $request->nip,
            'mata_pelajaran'=> $request->mata_pelajaran,
            'alamat'=> $request->alamat,
        ]);

        return redirect()->route('guru')->with('message', 'Data berhasil ditambahkan');
    }
    public function edit($id)
{
    $guru = Guru::findOrFail($id);
    return view('fe.admin.guru.edit', compact('guru'));
}
    public function update(Request $request, $id)
        {
            $guru = Guru::findOrFail($id);
            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->alamat = $request->alamat;
            $guru->save();

        return redirect()->route('fe.admin.guru.index')->with('message', 'Data guru berhasil diperbarui.');
        }
        public function delete($id)
        {
            $guru = Guru::findOrFail($id);
            $guru->delete();
        
            return redirect()->route('fe.admin.guru.index')->with('message', 'Data guru berhasil dihapus.');
        }
   
}

