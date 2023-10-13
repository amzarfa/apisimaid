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
            ['kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Sekretariat Daerah',],
            ['kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Dinas',],
            ['kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Badan',],
            ['kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Puskesmas',],
            ['kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Kecamatan-Kelurahan',],
            ['kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Sekolah',],
            ['kode_unit_obrik' => '319807', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Kantor',],
            ['kode_unit_obrik' => '319808', 'kode_unit_audit' => '3198', 'nama_unit_obrik' => 'Rumah Sakit',],
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
