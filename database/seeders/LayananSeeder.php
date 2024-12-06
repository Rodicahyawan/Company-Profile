<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run()
    {
        DB::table('layanan')->insert([
            [
                'id_layanan' => 1,
                'jenis_layanan' => 'Tambal Gigi',
                'gambar_utama' => 'images/iZOejqiJ3iG28sSK1N701C3ex4Zsim0Msxzyu42m.jpg',
                'deskripsi_singkat' => 'Prosedur untuk memperbaiki gigi berlubang atau rusak dengan mengisi bagian yang bermasalah menggunakan bahan tambalan.',
                'deskripsi_lengkap' => 'Tambal gigi adalah prosedur yang bertujuan untuk memperbaiki gigi yang berlubang atau rusak akibat kerusakan, seperti dari rongga gigi atau trauma. Dalam prosedur ini, dokter gigi akan menghapus bagian gigi yang terinfeksi atau tidak sehat, lalu mengisi rongga yang ditinggalkan dengan bahan tambalan. Proses ini tidak hanya mengembalikan fungsi gigi, tetapi juga melindungi gigi dari kerusakan lebih lanjut dan menjaga kesehatan mulut secara keseluruhan.',
                'gambar_kedua' => 'images/tJWxjMZ3QcF5JoODzlkXAFKnMXPhWBW6UR0PEAIh.jpg',
                'kapan_dibutuhkan' => 'Gigi Berlubang: Ketika ada rongga akibat kerusakan gigi yang disebabkan oleh bakteri dan asam.
                                      Gigi Retak atau Pecah: Jika gigi mengalami keretakan atau pecahan yang mengakibatkan sensitivitas atau rasa sakit.
                                      Erosi Gigi: Ketika enamel gigi menipis akibat erosi atau asam, menyebabkan gigi rentan terhadap kerusakan.
                                      Setelah Perawatan Saluran Akar: Gigi yang telah menjalani perawatan saluran akar biasanya memerlukan tambalan untuk mengembalikan kekuatannya.
                                      Gigi Sensitif: Jika gigi terasa sensitif saat mengonsumsi makanan atau minuman tertentu, tambalan dapat membantu melindungi area yang sensitif.'
            ],
            [
                'id_layanan' => 12,
                'jenis_layanan' => 'Cabut Gigi',
                'gambar_utama' => 'images/r1phBe1N4jedp2IusXj2AWognXHh74ejPvLSwvzA.jpg',
                'deskripsi_singkat' => 'Prosedur mengangkat gigi dari soketnya, biasanya dilakukan jika gigi sudah tidak bisa diselamatkan akibat kerusakan parah atau infeksi.',
                'deskripsi_lengkap' => 'Cabut gigi adalah prosedur medis yang dilakukan untuk mengangkat gigi dari soketnya di gusi. Prosedur ini biasanya dilakukan oleh dokter gigi dan melibatkan anestesi lokal untuk menghilangkan rasa sakit pada area yang akan dicabut. Ekstraksi gigi dilakukan sebagai langkah terakhir, terutama jika kondisi gigi sudah tidak memungkinkan untuk diselamatkan dengan perawatan lain, seperti tambal gigi atau perawatan saluran akar. Selain itu, pencabutan gigi juga bertujuan mencegah penyebaran infeksi atau kerusakan lebih lanjut pada gigi dan jaringan di sekitarnya.',
                'gambar_kedua' => 'images/EcDVQE4TOYx7bnPtkkeAsSemD6hJVMMH0Z9gRHF4.jpg',
                'kapan_dibutuhkan' => 'Kerusakan Gigi Parah: Ketika gigi mengalami pembusukan atau kerusakan hingga ke akar, dan tidak dapat diperbaiki dengan tambal gigi atau perawatan saluran akar.
                                      Infeksi atau Abses: Jika terjadi infeksi gigi yang parah hingga mencapai jaringan di sekitarnya dan tidak merespons antibiotik atau perawatan lain.
                                      Kepadatan Gigi Berlebih: Ada kebutuhan untuk mencabut gigi agar gigi lainnya memiliki ruang yang cukup, seperti sebelum pemasangan kawat gigi.
                                      Gigi Bungsu Terimpaksi: Jika gigi bungsu tidak tumbuh dengan benar dan menyebabkan nyeri atau masalah pada gigi sekitarnya.
                                      Trauma atau Cedera pada Gigi: Gigi patah atau rusak parah akibat kecelakaan yang tidak memungkinkan perbaikan dengan prosedur lain.'
            ],
            [
                'id_layanan' => 13,
                'jenis_layanan' => 'Scaling',
                'gambar_utama' => 'images/GbMfACNhcpYSN8VvFqLHUForUzTUYylMHVuV5YTA.jpg',
                'deskripsi_singkat' => 'Prosedur pembersihan gigi yang dilakukan untuk menghilangkan plak dan karang gigi yang menempel di permukaan gigi dan garis gusi.',
                'deskripsi_lengkap' => 'Scaling adalah prosedur pembersihan gigi yang dilakukan untuk menghilangkan plak dan karang gigi yang menempel di permukaan gigi dan sepanjang garis gusi. Prosedur ini bertujuan untuk membersihkan penumpukan bakteri yang dapat menyebabkan masalah kesehatan mulut, seperti radang gusi dan penyakit periodontal. Scaling dilakukan dengan menggunakan alat khusus, baik manual atau ultrasonik, untuk mengikis dan mengangkat plak serta karang gigi yang tidak bisa dibersihkan hanya dengan sikat gigi biasa.',
                'gambar_kedua' => 'images/dRORlQRbmzJBP2SlVwWwyUl2smHsfFP4SyMMFGiA.jpg',
                'kapan_dibutuhkan' => 'Penumpukan Plak dan Karang Gigi: Plak dan karang gigi yang menumpuk di permukaan gigi dan sepanjang garis gusi tidak bisa dihilangkan dengan sikat gigi biasa.
                                      Gusi Berdarah atau Meradang: Jika gusi sering berdarah atau tampak meradang, scaling dapat membantu menghilangkan bakteri penyebab iritasi.
                                      Bau Mulut (Halitosis): Penumpukan bakteri pada plak dan karang gigi bisa menyebabkan bau mulut; scaling membantu membersihkan penyebabnya.
                                      Pencegahan Penyakit Gusi: Untuk mengurangi risiko penyakit periodontal atau peradangan gusi, scaling dianjurkan secara berkala.
                                      Saran dari Dokter Gigi: Dokter gigi merekomendasikan scaling setiap 6 bulan sekali untuk menjaga kesehatan gigi dan gusi secara optimal.'
            ],
            [
                'id_layanan' => 14,
                'jenis_layanan' => 'Perawatan Saluran Akar',
                'gambar_utama' => 'images/X91ZQxeIV4FxtVYf5sv1f8G6QYw4hKYEMFpnya9a.png',
                'deskripsi_singkat' => 'Prosedur untuk mengobati infeksi pada pulpa dan akar gigi dengan mengangkat jaringan yang terinfeksi, membersihkan saluran, dan mengisinya.',
                'deskripsi_lengkap' => 'Perawatan saluran akar adalah prosedur medis yang dilakukan untuk mengobati infeksi pada pulpa dan akar gigi. Proses ini melibatkan pengangkatan jaringan pulpa yang terinfeksi, membersihkan saluran akar dari bakteri dan jaringan yang rusak, serta mengisi saluran dengan bahan biokompatibel untuk mencegah infeksi lebih lanjut. Tujuan utama perawatan saluran akar adalah untuk menyelamatkan gigi yang terinfeksi agar tetap dapat berfungsi dengan baik dan mencegah kebutuhan untuk mencabut gigi tersebut.',
                'gambar_kedua' => 'images/mZUOsg7h0MkRz8SR28gb50VZFPKaUaIbvJa1WmA9.jpg',
                'kapan_dibutuhkan' => 'Infeksi Pulpa Gigi: Ketika pulpa gigi terinfeksi akibat kerusakan, pembusukan, atau trauma, yang menyebabkan nyeri hebat dan pembengkakan.
                                      Nyeri Gigi Berkelanjutan: Jika ada nyeri gigi yang berkepanjangan, ini bisa menjadi tanda bahwa perawatan saluran akar diperlukan.
                                      Abses Gigi: Adanya abses atau benjolan di gusi yang disebabkan oleh infeksi pada pulpa gigi, yang menunjukkan adanya masalah serius yang perlu ditangani.
                                      Gigi Gelap atau Berubah Warna: Perubahan warna pada gigi, terutama menjadi gelap, bisa menjadi indikasi bahwa pulpa gigi mengalami kerusakan.
                                      Trauma pada Gigi: Gigi yang mengalami cedera atau patah yang mengakibatkan kerusakan pada pulpa dapat memerlukan perawatan saluran akar.'
            ],
            [
                'id_layanan' => 15,
                'jenis_layanan' => 'Pembuatan Gigi Palsu',
                'gambar_utama' => 'images/EPwLOsj8mGgrEjIikGUiAukokPs8EVuRiTUVhdQ7.jpg',
                'deskripsi_singkat' => 'Prosedur membuat prostesis untuk menggantikan gigi yang hilang, baik gigi tiruan lengkap maupun sebagian, untuk mengembalikan fungsi dan penampilan.',
                'deskripsi_lengkap' => 'Pembuatan gigi palsu adalah prosedur untuk membuat prostesis yang menggantikan gigi yang hilang, baik sebagai gigi tiruan lengkap maupun sebagian, dengan tujuan mengembalikan fungsi pengunyahan, memperbaiki penampilan, serta mendukung struktur wajah agar tetap terlihat alami. Gigi palsu dibuat dengan bahan seperti akrilik, porselen, atau logam yang disesuaikan dengan kebutuhan pasien. Prosedur ini melibatkan pembuatan cetakan dari gigi yang tersisa dan pembuatan gigi palsu sesuai dengan ukuran dan bentuk yang tepat.',
                'gambar_kedua' => 'images/mcCh17RbaFFXSK7hlSxF9vZG1bFPkzE5owOtvkpd.jpg',
                'kapan_dibutuhkan' => 'Gigi Hilang: Ketika seseorang kehilangan satu atau lebih gigi akibat kecelakaan, penyakit gigi, atau proses penuaan.
                                      Gigi Retak atau Rusak: Jika gigi rusak parah sehingga tidak dapat dipulihkan lagi dengan prosedur lain, gigi palsu dapat menjadi solusi pengganti.
                                      Estetika Gigi: Untuk memperbaiki penampilan estetika mulut dan senyum yang terpengaruh oleh gigi yang hilang atau rusak.
                                      Fungsi Pengunyahan: Jika kehilangan gigi mengganggu fungsi pengunyahan, gigi palsu dapat membantu mengembalikan kemampuan tersebut.
                                      Untuk Mencegah Perubahan Posisi Gigi: Gigi palsu dapat membantu mencegah gigi yang tersisa bergerak dan menciptakan masalah lebih lanjut dalam penataan gigi.'
            ]
        ]);
    }
}
