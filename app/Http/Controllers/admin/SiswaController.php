<?php

namespace App\Http\Controllers\Admin;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Pastikan untuk mengimpor Controller


class SiswaController extends Controller
{
    function index()
    {
        return view('fe.admin.siswa.index', [
            'siswa' => siswa::latest()->get()
        ]);
    }
    function add()
    {
        return view('fe.admin.siswa.insert');
    }
    function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'alamat' => 'required'
        ]);

        siswa::create([
            'nama'=> $request->nama,
            'nisn'=> $request->nisn,
            'kelas'=> $request->kelas,
            'alamat'=> $request->alamat,
        ]);

        return redirect()->route('siswa')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
{
    $siswa = Siswa::findOrFail($id);
    return view('fe.admin.siswa.edit', compact('siswa'));
}
    public function update(Request $request, $id)
        {
            $siswa = Siswa::findOrFail($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->kelas = $request->kelas;
            $siswa->alamat = $request->alamat;
            $siswa->save();

        return redirect()->route('fe.admin.siswa.index')->with('message', 'Data siswa berhasil diperbarui.');
        }
        public function delete($id)
        {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();
        
            return redirect()->route('fe.admin.siswa.index')->with('message', 'Data siswa berhasil dihapus.');
        }

        protected $fillable = [
            'siswa_id',
            'tgl_bayar',
            'jumlah',
            'status'
        ];
    
        public function siswa()
        {
            return $this->belongsTo(Siswa::class);
     }    

}
