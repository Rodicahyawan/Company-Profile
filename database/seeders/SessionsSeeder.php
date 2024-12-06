<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            [
                'id' => 'RAvVzPP7KMpZ8agBkGfkjWvOC5Z5FgGhGV3H3p1K',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
                'payload' => 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaWppQWNwWlNxMkRiak9FajdUREQ0V0xONUZ0YzlSZkpLSTJYSXYwNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ob21lcGFnZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO3M6MTE6ImlkX3BlbmdndW5hIjtpOjE1O3M6MTM6Im5hbWFfcGVuZ2d1bmEiO3M6MTM6IlJPREkgQ0FIWUFXQU4iO3M6MTE6ImZvdG9fcHJvZmlsIjtzOjU5OiJwcm9maWxlX2ltYWdlcy9sZnNsaVo5UjJ3UmhHeVJRSm9aMkF3R3FYZWhrNGdzSk95UmZCQVkxLnBuZyI7fQ==',
                'last_activity' => 1733457179
            ],
            [
                'id' => 'xVQuHtEpcRmmaOuEpiIU2yri6ubkNjxbZV9JbumZ',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGJuYUVXNjBnT0p4UjFLZFptZG1TcUxoMklYa0QzWFY1MDlITVRrUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWwiO319',
                'last_activity' => 1733034090
            ]
        ]);
    }
}
