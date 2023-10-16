<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeJenisPengawasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_jenis_pengawasan' => '01', 'nama_jenis_pengawasan' => 'Audit',],
            ['kode_jenis_pengawasan' => '02', 'nama_jenis_pengawasan' => 'Monitoring',],
            ['kode_jenis_pengawasan' => '03', 'nama_jenis_pengawasan' => 'Audit Tujuan Tertentu',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_jenis_pengawasan';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
