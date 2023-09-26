<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodePeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tr_kode_peran')->insert([
            [
                'kode_peran' => '99',
                'nama_peran' => 'Berdasarkan Jabatan Pegawai',
            ],
            [
                'kode_peran' => 'PJ',
                'nama_peran' => 'Penanggung Jawab',
            ],
            [
                'kode_peran' => 'WPJ',
                'nama_peran' => 'Wakil Penanggungjawab',
            ],
            [
                'kode_peran' => 'PM',
                'nama_peran' => 'Pengendali Mutu',
            ],
            [
                'kode_peran' => 'KO',
                'nama_peran' => 'Koordinator',
            ],
            [
                'kode_peran' => 'PT',
                'nama_peran' => 'Pengendali Teknis',
            ],
            [
                'kode_peran' => 'PKA',
                'nama_peran' => 'Pemberi Keterangan Ahli',
            ],
            [
                'kode_peran' => 'QA',
                'nama_peran' => 'Penjamin Kualitas',
            ],
            [
                'kode_peran' => 'PPA',
                'nama_peran' => 'Pendamping PKA',
            ],
            [
                'kode_peran' => 'KT',
                'nama_peran' => 'Ketua Tim',
            ],
            [
                'kode_peran' => 'AT',
                'nama_peran' => 'Anggota Tim',
            ],
            [
                'kode_peran' => 'NS',
                'nama_peran' => 'Narasumber',
            ],
            [
                'kode_peran' => 'TA',
                'nama_peran' => 'Tenaga Ahli',
            ],
            [
                'kode_peran' => 'LL',
                'nama_peran' => 'Lain - Lain',
            ],
            [
                'kode_peran' => 'THL',
                'nama_peran' => 'Tenaga Harian Lepas',
            ],
        ]);
    }
}
