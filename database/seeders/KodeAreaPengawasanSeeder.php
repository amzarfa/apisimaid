<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeAreaPengawasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_area_pengawasan' => '01', 'nama_area_pengawasan' => 'Pendidikan',],
            ['kode_area_pengawasan' => '02', 'nama_area_pengawasan' => 'Kesehatan',],
            ['kode_area_pengawasan' => '03', 'nama_area_pengawasan' => 'Keuangan',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_area_pengawasan';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
