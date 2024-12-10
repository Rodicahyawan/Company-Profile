<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanTable extends Migration
{
    public function up()
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->increments('id_ulasan');
            $table->unsignedBigInteger('user_id')->nullable(); // Referensi ke tabel users
            $table->string('nama_pasien', 255);
            $table->integer('rating')->unsigned();
            $table->string('jenis_layanan', 100)->nullable();
            $table->text('ulasan')->nullable();
            $table->unsignedInteger('layanan_id')->nullable(); // Sesuaikan tipe data dengan tabel layanan
            $table->timestamps();
        
            // Foreign key ke tabel users
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        
            // Foreign key ke tabel layanan
            $table->foreign('layanan_id')
                ->references('id_layanan') // Sesuaikan dengan nama kolom pada tabel layanan
                ->on('layanan')
                ->onDelete('cascade');
        });        
    }

    public function down()
    {
        Schema::dropIfExists('ulasan');
    }
}
