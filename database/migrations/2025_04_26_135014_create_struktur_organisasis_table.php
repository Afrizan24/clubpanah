<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrukturOrganisasisTable extends Migration
{
    public function up()
    {
        Schema::create('struktur_organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('jabatan');
            $table->string('keahlian')->nullable();
            $table->string('divisi')->nullable();
            $table->string('foto')->nullable();
            $table->date('tanggal_bergabung');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('struktur_organisasis');
    }
}
