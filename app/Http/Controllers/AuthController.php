<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Fungsi untuk proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'username'=> $request->username,
            'password'=> $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role=='admin'){
                return redirect('/admin');
            } elseif(Auth::user()->role=='guru'){
                return redirect('/guru');
            } elseif(Auth::user()->role=='siswa'){
                return redirect('/siswa');
            } elseif(Auth::user()->role=='kepsek'){
                return redirect('/kepsek');
            }

        } else {
            // Jika autentikasi gagal, redirect kembali ke halaman login dengan error
            return redirect()->back()
                ->withErrors(['login' => 'Username atau Password yang dimasukkan tidak sesuai'])
                ->withInput();
        }
    }
}

