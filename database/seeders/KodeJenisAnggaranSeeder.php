<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeJenisAnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_jenis_anggaran' => '01', 'nama_jenis_anggaran' => 'APBN',],
            ['kode_jenis_anggaran' => '02', 'nama_jenis_anggaran' => 'APBD',],
            ['kode_jenis_anggaran' => '03', 'nama_jenis_anggaran' => 'BUMN',],
            ['kode_jenis_anggaran' => '04', 'nama_jenis_anggaran' => 'BUMD',],
            ['kode_jenis_anggaran' => '05', 'nama_jenis_anggaran' => 'BLU',],
            ['kode_jenis_anggaran' => '06', 'nama_jenis_anggaran' => 'BLUD',],
            ['kode_jenis_anggaran' => '11', 'nama_jenis_anggaran' => 'LOAN DALAM NEGERI',],
            ['kode_jenis_anggaran' => '12', 'nama_jenis_anggaran' => 'LOAN LUAR NEGERI',],
            ['kode_jenis_anggaran' => '13', 'nama_jenis_anggaran' => 'NGO',],
            ['kode_jenis_anggaran' => '99', 'nama_jenis_anggaran' => 'LAINNYA',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_jenis_anggaran';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
