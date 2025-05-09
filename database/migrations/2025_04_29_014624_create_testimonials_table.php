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
    Schema::create('testimonials', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('layanan_id')->nullable();
        $table->string('nama');
        $table->string('jabatan');
        $table->text('isi');
        $table->string('foto')->nullable();
        $table->timestamps();

        $table->foreign('layanan_id')->references('id')->on('informasi_layanans')->onDelete('cascade');
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
