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
                'kode_peran' => 'irban',
                'nama_peran' => 'IRBAN',
                'modul' => 'ren',
            ],
            [
                'kode_peran' => 'inspektur',
                'nama_peran' => 'INSPEKTUR',
                'modul' => 'ren',
            ],
            [
                'kode_peran' => 'evlap',
                'nama_peran' => 'EVLAP',
                'modul' => 'ren',
            ],
            [
                'kode_peran' => 'pegawai',
                'nama_peran' => 'PEGAWAI',
                'modul' => 'ren',
            ],
            [
                'kode_peran' => 'admin-ren',
                'nama_peran' => 'ADMIN SIMAREN',
                'modul' => 'ren',
            ],
        ]);
    }
}
