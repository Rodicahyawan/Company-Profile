<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Pastikan peran 'admin' sudah ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Data pengguna admin
        $admins = [
            ['email' => 'admin1@example.com', 'password' => 'secret1'],
            ['email' => 'admin2@example.com', 'password' => 'secret2'],
            ['email' => 'admin3@example.com', 'password' => 'secret3'],
            ['email' => 'admin4@example.com', 'password' => 'secret4'],
            ['email' => 'admin5@example.com', 'password' => 'secret5'],
        ];

        // Buat pengguna admin dan berikan role 'admin'
        foreach ($admins as $key => $admin) {
            $user = User::create([
                'name' => 'Admin User ' . ($key + 1),
                'email' => $admin['email'],
                'password' => bcrypt($admin['password']),
            ]);

            // Memberikan role 'admin' pada pengguna yang baru dibuat
            $user->assignRole($adminRole);
        }

        // Data pengguna tanpa role dengan kolom tambahan dan ID
        $usersWithoutRole = [
            [
                'id' => 1111,
                'nama_pengguna' => 'Gunawan',
                'alamat' => 'JL. SIKENGKENG 1 RT4 RW3 KARANGANYAR',
                'email' => 'gunawan@gmail.com',
                'no_telepon' => '0893211023210',
                'password' => bcrypt('secret1'),
                'foto_profil' => 'profile_images/Ey1JLXsA9EqE9HDOf5gfLMs9YFRSvCuAkHbInElJ.png',
            ],
            [
                'id' => 2222,
                'nama_pengguna' => 'RODI CAHYAWAN',
                'alamat' => 'JL. SIKENGKENG 1 RT4 RW3 KARANGANYAR',
                'email' => 'rcahya@gmail.com',
                'no_telepon' => '0893211023213',
                'password' => bcrypt('secret2'),
                'foto_profil' => 'profile_images/lfsliZ9R2wRhGyRQJoZ2AwGqXehk4gsJOyRfBAY1.png',
            ],
            [
                'id' => 3333,
                'nama_pengguna' => 'Gifar Undi',
                'alamat' => 'Jalan Raya Maos',
                'email' => 'gifar123@gmail.com',
                'no_telepon' => '0893211023213',
                'password' => bcrypt('secret3'),
                'foto_profil' => NULL,
            ],
            [
                'id' => 4444,
                'nama_pengguna' => 'Puji Ariyanti',
                'alamat' => 'Perum Bobosan Citra Asri',
                'email' => 'pujiariyanti@gmail.com',
                'no_telepon' => '081364758895',
                'password' => bcrypt('secret4'),
                'foto_profil' => 'profile_images/GOdGPV7GFxRmBFA1xRL7jTOZFPcuAq4RlyTUuqsR.png',
            ],
            [
                'id' => 5555,
                'nama_pengguna' => 'Dimas Sanjaya',
                'alamat' => 'Jl. Jeruk Adipala',
                'email' => 'dimasanjay@gmail.com',
                'no_telepon' => '08136475811',
                'password' => bcrypt('secret5'),
                'foto_profil' => NULL,
            ],
        ];

        // Buat pengguna tanpa role dan tambah data tambahan
        foreach ($usersWithoutRole as $user) {
            User::create([
                'id' => $user['id'],  // Menetapkan ID pengguna sesuai dengan tabel 'users'
                'name' => $user['nama_pengguna'],
                'email' => $user['email'],
                'password' => $user['password'],
                'nama_pengguna' => $user['nama_pengguna'],
                'alamat' => $user['alamat'],
                'no_telepon' => $user['no_telepon'],
                'foto_profil' => $user['foto_profil'],
            ]);
        }
    }
}
