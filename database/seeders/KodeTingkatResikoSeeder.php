<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeTingkatResikoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_tingkat_resiko' => '01', 'nama_tingkat_resiko' => 'Rendah',],
            ['kode_tingkat_resiko' => '02', 'nama_tingkat_resiko' => 'Sedang',],
            ['kode_tingkat_resiko' => '03', 'nama_tingkat_resiko' => 'Tinggi',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_tingkat_resiko';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
