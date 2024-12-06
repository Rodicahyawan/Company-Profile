<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriTable extends Migration
{
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id_gambar');
            $table->string('nama_perawatan', 255);
            $table->string('jenis_layanan', 100)->nullable();
            $table->string('gambar', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeri');
    }
}
