<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananTable extends Migration
{
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->increments('id_layanan');
            $table->string('jenis_layanan', 100);
            $table->string('gambar_utama', 255)->nullable();
            $table->string('deskripsi_singkat', 255);
            $table->text('deskripsi_lengkap');
            $table->string('gambar_kedua', 255)->nullable();
            $table->text('kapan_dibutuhkan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanan');
    }
}
