<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntreanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('antrean')->insert([
            [
                'user_id' => 1111,  // Ganti id_pengguna dengan user_id
                'id_antrean' => 12,
                'no_antrean' => 1,
                'nama_pasien' => 'Rodi Cahyawan',
                'tanggal_lahir' => '2002-11-18',
                'jenis_kelamin' => 'Laki-laki',
                'keluhan' => 'Gigi linu ketika minum dingin atau terkena angin ANJING SUMPAHHHHHHHHHHHHHHHHHHHHHHHHJ KDJDHSN  HSHAJ',
                'layanan_id' => 1,
                'tanggal_kedatangan' => '2024-11-19',
                'status_antrean' => 'Selesai',
                'nik' => '3301031811020004'
            ],
            [
                'user_id' => 2222,  // Ganti id_pengguna dengan user_id
                'id_antrean' => 18,
                'no_antrean' => 1,
                'nama_pasien' => 'Puji Ariyanti',
                'tanggal_lahir' => '1996-01-24',
                'jenis_kelamin' => 'Perempuan',
                'keluhan' => 'Gigi linu ketika minum dingin atau terkena angin',
                'layanan_id' => 1,
                'tanggal_kedatangan' => '2024-11-23',
                'status_antrean' => 'Selesai',
                'nik' => '3301031811020005'
            ],
            [
                'user_id' => 3333,  // Ganti id_pengguna dengan user_id
                'id_antrean' => 20,
                'no_antrean' => 2,
                'nama_pasien' => 'Gifar Undi Setiawan',
                'tanggal_lahir' => '2008-02-15',
                'jenis_kelamin' => 'Laki-laki',
                'keluhan' => 'Gigi linu ketika minum dingin atau terkena angin',
                'layanan_id' => 1,
                'tanggal_kedatangan' => '2024-11-23',
                'status_antrean' => 'Selesai',
                'nik' => '3301031811020001'
            ],
            [
                'user_id' => 4444,  // Ganti id_pengguna dengan user_id
                'id_antrean' => 21,
                'no_antrean' => 1,
                'nama_pasien' => 'Gunawan Sputra',
                'tanggal_lahir' => '0006-12-21',
                'jenis_kelamin' => 'Laki-laki',
                'keluhan' => 'Gigi linu ketika minum dingin atau terkena angin',
                'layanan_id' => 1,
                'tanggal_kedatangan' => '2024-11-25',
                'status_antrean' => 'Selesai',
                'nik' => '3301031811020002'
            ],
            // Tambahkan data lainnya sesuai dengan kebutuhan
            // ...
        ]);
    }
}
