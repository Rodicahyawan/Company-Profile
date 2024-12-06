<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntreanTable extends Migration
{
    public function up()
    {
        Schema::create('antrean', function (Blueprint $table) {
            $table->increments('id_antrean');
            $table->unsignedBigInteger('user_id')->nullable();  // Foreign key untuk user
            $table->integer('no_antrean');
            $table->string('nama_pasien', 255);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('keluhan')->nullable();
            $table->unsignedInteger('layanan_id');   // Mengganti jenis_layanan dengan layanan_id yang merujuk ke tabel layanan
            $table->date('tanggal_kedatangan');
            $table->enum('status_antrean', ['Dalam Antrean', 'Selesai'])->default('Dalam Antrean');
            $table->string('nik', 16);
            $table->timestamps();

            // Menambahkan Unique constraint untuk kombinasi nik dan tanggal_kedatangan
            $table->unique(['nik', 'tanggal_kedatangan']);

            // Menambahkan foreign key untuk user_id
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Menghapus data antrean jika user dihapus

            // Menambahkan foreign key untuk layanan_id
            $table->foreign('layanan_id')
            ->references('id_layanan') // Sesuaikan dengan nama kolom pada tabel layanan
            ->on('layanan')
            ->onDelete('cascade');// Menghapus data antrean jika layanan dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('antrean');
    }
}
