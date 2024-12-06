<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tentang')->insert([
            ['id_tentang' => 1, 'keunggulan' => 'Tentang Kami', 'deskripsi' => 'Praktik Dokter Gigi drg. Dwi Imbang Lestari merupakan pusat layanan kesehatan gigi terpercaya yang telah beroperasi sejak 2015 di Kabupaten Cilacap, Jawa Tengah. Didirikan oleh drg. Dwi Imbang Lestari, praktik kami berlokasi di Jl. A. Yani Adipala No.18, Kecamatan Adipala, dengan tujuan memberikan layanan perawatan gigi yang aman, nyaman, dan profesional bagi masyarakat sekitar. Di sini, setiap pasien mendapatkan perhatian penuh dan perawatan komprehensif dari drg. Dwi Imbang Lestari, yang didukung oleh asisten yang berpengalaman.\r\n\r\nKami menyediakan beragam layanan perawatan gigi yang meliputi penambalan, pencabutan gigi, pembersihan karang gigi, pembuatan gigi tiruan, pemasangan behel, perawatan saluran akar, hingga berbagai perawatan estetika dan kesehatan gigi lainnya. Setiap prosedur dilaksanakan dengan standar sterilitas yang tinggi dan pendekatan ramah yang membuat pasien merasa tenang. \r\n\r\nDi Praktik Dokter Gigi drg. Dwi Imbang Lestari, kami percaya bahwa senyum sehat adalah investasi jangka panjang. Oleh karena itu, kami terus berupaya memberikan layanan yang disesuaikan dengan kebutuhan masing-masing pasien, dengan komitmen untuk meningkatkan kesehatan dan kebersihan gigi masyarakat. Kunjungi kami dan temukan pengalaman perawatan gigi yang berkualitas di lingkungan yang bersih, modern, dan penuh perhatian.', 'gambar' => 'images/mn8jRByITCc3x5WM984qe0gvCAL4V1LXnwj3mLMa.jpg'],
            ['id_tentang' => 7, 'keunggulan' => 'Staf dan Dokter Gigi yang Ramah', 'deskripsi' => 'Tim kami terdiri dari asisten dan dokter gigi yang ramah, siap memberikan pengalaman perawatan yang nyaman dan menyenangkan.', 'gambar' => 'images/L3Wx11ZymTlMiSAt7p3ivqmOFC32Lflt4y2LEj4Y.jpg'],
            ['id_tentang' => 8, 'keunggulan' => 'Sterilisasi Alat Untuk Perlindungan Optimal', 'deskripsi' => 'Setiap alat yang digunakan telah melalui proses sterilisasi, untuk memastikan kebersihan dan keamanan. Keamanan pasien adalah prioritas utama kami.', 'gambar' => 'images/nN8kKCysHZRcc4BQQh5uaazVQYCgDkKVw1N2uNX0.jpg'],
            ['id_tentang' => 9, 'keunggulan' => 'Akses Informasi yang Lengkap dan Mudah', 'deskripsi' => 'Semua informasi tersedia di website dan media sosial. Admin siap memberikan informasi yang diperlukan pasien melalui aplikasi chat WhatsApp.', 'gambar' => 'images/BWE1fImzhMSOcu8MRtkDlzwZEKFZXyd4XvL0iyGk.jpg'],
            ['id_tentang' => 10, 'keunggulan' => 'Peralatan Dental yang Canggih', 'deskripsi' => 'Kami menggunakan peralatan dengan teknologi terbaru untuk memberikan perawatan yang lebih efisien dan nyaman bagi setiap pasien.', 'gambar' => 'images/LMRmMzio9FLbAyeBMeAn1LFNYFbk3oDXlOTmr7Wu.jpg'],
            ['id_tentang' => 11, 'keunggulan' => 'Kemudahan Transaksi', 'deskripsi' => 'Kami menawarkan metode pembayaran yang memudahkan pasien dalam menyelesaikan transaksi dengan cepat dan aman.', 'gambar' => 'images/0Edwm8XYlhBARlBDJObyvtwLZ8o6Nw85cl13kUCh.jpg'],
            ['id_tentang' => 12, 'keunggulan' => 'Lokasi Strategis', 'deskripsi' => 'Lokasipraktik kami sangat strategis dan mudah diakses, berada di jalan raya utama, sehingga memudahkan pasien untuk menjangkau kami dengan mudah.', 'gambar' => 'images/hUlzJyZNerPGPfhUWxbSqhGZJTd4vF2sYTkhUHc8.png']
        ]);
    }
}
