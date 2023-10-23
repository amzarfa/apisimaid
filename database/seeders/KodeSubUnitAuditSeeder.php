<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeSubUnitAuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_sub_unit_audit' => '319801', 'kode_unit_audit' => '3198', 'nama_sub_unit_audit' => 'IRBAN 1 LATIHAN'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nama_sub_unit_audit' => 'INSPEKTORAT KABUPATEN MUSI RAWAS'],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_sub_unit_audit';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
