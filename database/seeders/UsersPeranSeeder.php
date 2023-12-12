<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersPeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data ke tabel users_peran
        DB::table('users_peran')->insert([
            [
                'kode_peran' => 'user',
                'nama_peran' => 'USER',
            ],
            [
                'kode_peran' => 'admin',
                'nama_peran' => 'ADMINISTRATOR',
            ],
        ]);
    }
}
