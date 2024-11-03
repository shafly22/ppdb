<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pembayaran_spps', function (Blueprint $table) {
        $table->id();
        $table->foreignId('siswa_id')->constrained()->onDelete('cascade'); // Menghubungkan ke tabel siswa
        $table->date('tgl_bayar');
        $table->decimal('jumlah', 10, 2);
        $table->string('status'); // 'lunas' atau 'belum lunas'
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_spps');
    }
};
