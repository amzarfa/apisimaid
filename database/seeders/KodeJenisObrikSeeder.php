<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeJenisObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_jenis_obrik' => '01', 'nama_jenis_obrik' => 'SATKER / OPD',],
            ['kode_jenis_obrik' => '02', 'nama_jenis_obrik' => 'PROYEK',],
            ['kode_jenis_obrik' => '03', 'nama_jenis_obrik' => 'BUMN',],
            ['kode_jenis_obrik' => '04', 'nama_jenis_obrik' => 'BUMD',],
            ['kode_jenis_obrik' => '05', 'nama_jenis_obrik' => 'BLU',],
            ['kode_jenis_obrik' => '06', 'nama_jenis_obrik' => 'BLUD',],
            ['kode_jenis_obrik' => '10', 'nama_jenis_obrik' => 'SWASTA',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_jenis_obrik';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
