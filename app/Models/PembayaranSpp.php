<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSpp extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'tgl_bayar', 'jumlah', 'status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
