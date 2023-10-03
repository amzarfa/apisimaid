<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeGrupLingkupAuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_grup_lingkup_audit' => '01', 'nama_grup_lingkup_audit' => 'INSPEKTORAT', 'is_prov' => '0',],
            ['kode_grup_lingkup_audit' => '02', 'nama_grup_lingkup_audit' => 'BPKP', 'is_prov' => '0',],
            ['kode_grup_lingkup_audit' => '03', 'nama_grup_lingkup_audit' => 'BPK', 'is_prov' => '0',],
            ['kode_grup_lingkup_audit' => '04', 'nama_grup_lingkup_audit' => 'KEMENDAGRI', 'is_prov' => '0',],
            ['kode_grup_lingkup_audit' => '05', 'nama_grup_lingkup_audit' => 'APIP LAINNYA', 'is_prov' => '0',],
            ['kode_grup_lingkup_audit' => '06', 'nama_grup_lingkup_audit' => 'INSPEKTORAT PROVINSI', 'is_prov' => '1',],
            ['kode_grup_lingkup_audit' => '10', 'nama_grup_lingkup_audit' => 'KHUSUS', 'is_prov' => '0',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_grup_lingkup_audit';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
