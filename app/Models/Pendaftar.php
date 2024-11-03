<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    
        protected $table = 'pendaftar'; // Nama tabel
        protected $fillable = ['nama', 'jenis_kelamin', 'alamat', 'tanggal_lahir', ]; // Kolom yang bisa diisi
    
}
