<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUlasanTable extends Migration
{
    public function up()
    {
        Schema::table('ulasan', function (Blueprint $table) {
            $table->enum('status', ['Ditampilkan', 'Disembunyikan'])->default('Ditampilkan');
        });
    }

    public function down()
    {
        Schema::table('ulasan', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
