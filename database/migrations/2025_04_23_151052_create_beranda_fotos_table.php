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
        Schema::create('beranda_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // 'hero1', 'hero2', 'galeri1', 'galeri2', 'galeri3', 'galeri4', 'about1', 'about2', 'about3'
            $table->string('gambar');
            $table->string('judul')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda_fotos');
    }
};
