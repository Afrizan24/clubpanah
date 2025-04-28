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
        Schema::create('beranda_contents', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('tentang_kami')->nullable();
            $table->string('alamat')->nullable();
            $table->string('google_maps')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda_contents');
    }
};
