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
        Schema::create('pembayaran_ppdb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->date('tgl_bayar');
            $table->decimal('jumlah', 10, 2);
            $table->string('status'); // Status pembayaran
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_ppdb');
    }
};
