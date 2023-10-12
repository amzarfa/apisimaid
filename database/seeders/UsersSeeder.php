<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Muhammad Amzar Fadliatma Putra',
                'nip' => '199209162020121007',
                'email' => 'amzarfa7@gmail.com',
                'password' => Hash::make('password'),
                'kode_unit_audit' => '3198',
                'kode_sub_unit_audit' => '319801',
                'peran' => 'admin',
            ],
            [
                'name' => 'Gugun Mediamer',
                'nip' => '199801012020121003',
                'email' => 'mediamergugun2@gmail.com',
                'password' => Hash::make('password'),
                'kode_unit_audit' => '3198',
                'kode_sub_unit_audit' => '319801',
                'peran' => 'admin',
            ],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'users';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
