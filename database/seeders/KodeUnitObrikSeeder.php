<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeUnitObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Sekretariat Daerah',],
            ['kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Dinas',],
            ['kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Badan',],
            ['kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Puskesmas',],
            ['kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Kecamatan-Kelurahan',],
            ['kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Sekolah',],
            ['kode_unit_obrik' => '160507', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Kantor',],
            ['kode_unit_obrik' => '160508', 'kode_unit_audit' => '1605', 'nama_unit_obrik' => 'Rumah Sakit',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_unit_obrik';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
