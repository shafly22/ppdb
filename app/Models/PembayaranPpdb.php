<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPpdb extends Model
{
    use HasFactory;

    // Definisikan tabel jika berbeda dengan nama model
    protected $table = 'pembayaran_ppdb';

    // Mass assignable attributes
    protected $fillable = [
        'pendaftar_id',
        'tgl_bayar',
        'jumlah',
        'status'
    ];

    // Relasi ke model Pendaftar
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }
}
