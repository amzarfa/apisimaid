<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RenJakwasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_sub_unit_audit' => '319801', 'kode_unit_audit' => '3198', 'tahun' => '2023', 'nama_jakwas' => 'Test Jakwas Dummy Irban Latihan', 'deskripsi' => 'Keterangan dari Jakwas Dummy Irban Latihan',],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'tahun' => '2023', 'nama_jakwas' => 'Test Jakwas Dummy Inspektorat Musi Rawas', 'deskripsi' => 'Keterangan dari Jakwas Dummy Inspektorat Musi Rawas',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'ren_jakwas';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
