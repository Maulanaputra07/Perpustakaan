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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('id_buku');
            $table->foreignId('id_genre');
            $table->string('judul_buku');
            $table->string('cover');
            $table->string('deskripsi');
            $table->string('penulis');
            $table->string('penerbit');
            $table->date('tahun_terbit');
            $table->integer('stock')->default(0);
            $table->binary('file_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
