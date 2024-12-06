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
            $table->unsignedBigInteger('user_id')->nullable();  // Ubah id_pengguna menjadi user_id
            $table->string('nama_pasien', 255);
            $table->integer('rating')->unsigned();
            $table->string('jenis_layanan', 100)->nullable();
            $table->text('ulasan')->nullable();
            $table->timestamps();

            // Ubah referensi ke foreign key user_id
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); // Menghapus data antrean jika user dihapus

        });
    }

    public function down()
    {
        Schema::dropIfExists('ulasan');
    }
}
