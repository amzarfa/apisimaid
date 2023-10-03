<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeLingkupAuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_lingkup_audit' => '0101', 'kode_grup_lingkup_audit' => '01', 'nama_lingkup_audit' => 'AUDIT KINERJA/OPERASIONAL',],
            ['kode_lingkup_audit' => '0102', 'kode_grup_lingkup_audit' => '01', 'nama_lingkup_audit' => 'AUDIT DENGAN TUJUAN TERTENTU',],
            ['kode_lingkup_audit' => '0103', 'kode_grup_lingkup_audit' => '01', 'nama_lingkup_audit' => 'REVIU',],
            ['kode_lingkup_audit' => '0104', 'kode_grup_lingkup_audit' => '01', 'nama_lingkup_audit' => 'EVALUASI',],
            ['kode_lingkup_audit' => '0105', 'kode_grup_lingkup_audit' => '01', 'nama_lingkup_audit' => 'PEMANTAUAN',],
            ['kode_lingkup_audit' => '0199', 'kode_grup_lingkup_audit' => '01', 'nama_lingkup_audit' => 'KEGIATAN PENGAWASAN LAINNYA',],
            ['kode_lingkup_audit' => '0201', 'kode_grup_lingkup_audit' => '02', 'nama_lingkup_audit' => 'PEMANTAUAN',],
            ['kode_lingkup_audit' => '0301', 'kode_grup_lingkup_audit' => '03', 'nama_lingkup_audit' => 'PEMANTAUAN',],
            ['kode_lingkup_audit' => '0401', 'kode_grup_lingkup_audit' => '04', 'nama_lingkup_audit' => 'PEMANTAUAN',],
            ['kode_lingkup_audit' => '0501', 'kode_grup_lingkup_audit' => '05', 'nama_lingkup_audit' => 'PEMANTAUAN',],
            ['kode_lingkup_audit' => '0601', 'kode_grup_lingkup_audit' => '06', 'nama_lingkup_audit' => 'PEMANTAUAN',],
            ['kode_lingkup_audit' => '1001', 'kode_grup_lingkup_audit' => '10', 'nama_lingkup_audit' => 'AUDIT PERHITUNGAN KERUGIAN NEG',],
            ['kode_lingkup_audit' => '1099', 'kode_grup_lingkup_audit' => '10', 'nama_lingkup_audit' => 'AUDIT KHUSUS LAINNYA',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_lingkup_audit';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
