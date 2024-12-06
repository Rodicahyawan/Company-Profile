<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galeri')->insert([
            ['id_gambar' => 6, 'nama_perawatan' => 'Pemasangan behel atas', 'jenis_layanan' => 'Pemasangan Behel', 'gambar' => 'images/l0ja3F6s59qkoZPxtlZ8i3BCJEN7HMmydVgIEEFR.jpg'],
            ['id_gambar' => 8, 'nama_perawatan' => 'Pemasangan behel atas bawah', 'jenis_layanan' => 'Pemasangan Behel', 'gambar' => 'images/5Tsdgdwfkj5wsQJNXKZmXI4wpJ0ekWPjToqMVEec.jpg'],
            ['id_gambar' => 9, 'nama_perawatan' => 'Pemasangan behel bawah', 'jenis_layanan' => 'Pemasangan Behel', 'gambar' => 'images/JS8esNEpI86hiCcPBI04lFXoSHo35KRH9ngd2LMd.jpg'],
            ['id_gambar' => 10, 'nama_perawatan' => 'Bongkar tambalan lama', 'jenis_layanan' => 'Tambal Gigi', 'gambar' => 'images/xyzrgVp3enpZc5JUk5MkHYTGArdujAIcsGqUcHaH.jpg'],
            ['id_gambar' => 11, 'nama_perawatan' => 'Cabut gigi bungsu kanan bawah', 'jenis_layanan' => 'Cabut Gigi', 'gambar' => 'images/XBVaG3ZousQaVa0JOq8Ev6YFkFdWz2JJbrAGtCnJ.jpg'],
            ['id_gambar' => 12, 'nama_perawatan' => 'Cabut gigi bungsu kiri bawah', 'jenis_layanan' => 'Cabut Gigi', 'gambar' => 'images/keUBS49dpQfFT04cfPrG7wAhpTAq4egeatyiTJc9.jpg'],
            ['id_gambar' => 13, 'nama_perawatan' => 'Cabut gigi geraham bawah', 'jenis_layanan' => 'Cabut Gigi', 'gambar' => 'images/RyPMI8CQJLw5SEOM2kN5D6VznzCyw6I3wHCDNx7D.jpg'],
            ['id_gambar' => 14, 'nama_perawatan' => 'Clear retainer', 'jenis_layanan' => 'Lainnya', 'gambar' => 'images/CCKGdjKs97dUQ6NIN8ZPWktaFYI480yDCFS9Pm4T.jpg'],
            ['id_gambar' => 15, 'nama_perawatan' => 'Mahkota gigi / dental crown', 'jenis_layanan' => 'Crown Gigi', 'gambar' => 'images/8TrZVcTFnFVIjjla1HhQaCdxf1eyYRGUzXKTrzRU.jpg'],
            ['id_gambar' => 16, 'nama_perawatan' => 'Pemasangan fiber splint', 'jenis_layanan' => 'Lainnya', 'gambar' => 'images/cS75qv5tiN7XThMH4mQVh0pYNVCGaHmqmZ6qGBOV.jpg'],
            ['id_gambar' => 17, 'nama_perawatan' => 'Pemasangan fiber splint', 'jenis_layanan' => 'Lainnya', 'gambar' => 'images/t9tKdomLzoMd1UWcMXgPjgjeXRyKv0tWbm6K5X7o.jpg'],
            ['id_gambar' => 18, 'nama_perawatan' => 'Pembuatan gigi palsu', 'jenis_layanan' => 'Pembuatan Gigi Palsu', 'gambar' => 'images/TQhokOMPHsZoQv6isi3hCUH9mhnQzuTm17BDDSgP.jpg'],
            ['id_gambar' => 19, 'nama_perawatan' => 'Pembuatan gigi palsu', 'jenis_layanan' => 'Pembuatan Gigi Palsu', 'gambar' => 'images/WK4GrX89p96rI0C4KQ7h1csK2CgoiEStZJ53pVTD.jpg'],
        ]);
    }
}
