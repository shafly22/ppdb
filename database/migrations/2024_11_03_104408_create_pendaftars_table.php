<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id(); // Kolom id dengan auto increment
            $table->string('nama'); // Kolom untuk nama
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Kolom untuk jenis kelamin
            $table->date('tanggal_lahir'); // Kolom untuk tanggal lahir
            $table->string('alamat'); // Kolom untuk alamat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
