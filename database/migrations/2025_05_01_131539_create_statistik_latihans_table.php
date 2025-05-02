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
        // database/migrations/xxxx_xx_xx_create_statistik_latihans_table.php
        Schema::create('statistik_latihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('struktur_organisasi_id')->constrained()->onDelete('cascade');
            $table->integer('push_up');
            $table->integer('tahan_nafas');
            $table->integer('on_target');
            $table->integer('off_target');
            $table->integer('latihan_konsentrasi');
            $table->integer('waktu_latihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_latihans');
    }
};
