<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tr_kode_provinsi')->insert([
            [
                'kode_provinsi' => '11',
                'nama_provinsi' => 'Provinsi Aceh',
            ],
            [
                'kode_provinsi' => '12',
                'nama_provinsi' => 'Provinsi Sumatera Utara',
            ],
            [
                'kode_provinsi' => '13',
                'nama_provinsi' => 'Provinsi Sumatera Barat',
            ],
            [
                'kode_provinsi' => '14',
                'nama_provinsi' => 'Provinsi Riau',
            ],
            [
                'kode_provinsi' => '15',
                'nama_provinsi' => 'Provinsi Jambi',
            ],
            [
                'kode_provinsi' => '16',
                'nama_provinsi' => 'Provinsi Sumatera Selatan',
            ],
            [
                'kode_provinsi' => '17',
                'nama_provinsi' => 'Provinsi Bengkulu',
            ],
            [
                'kode_provinsi' => '18',
                'nama_provinsi' => 'Provinsi Lampung',
            ],
            [
                'kode_provinsi' => '19',
                'nama_provinsi' => 'Provinsi Kepulauan Bangka Belitung',
            ],
            [
                'kode_provinsi' => '21',
                'nama_provinsi' => 'Provinsi Kepulauan Riau',
            ],
            [
                'kode_provinsi' => '31',
                'nama_provinsi' => 'Provinsi DKI Jakarta',
            ],
            [
                'kode_provinsi' => '32',
                'nama_provinsi' => 'Provinsi Jawa Barat',
            ],
            [
                'kode_provinsi' => '33',
                'nama_provinsi' => 'Provinsi Jawa Tengah',
            ],
            [
                'kode_provinsi' => '34',
                'nama_provinsi' => 'Provinsi D.I. Yogyakarta',
            ],
            [
                'kode_provinsi' => '35',
                'nama_provinsi' => 'Provinsi Jawa Timur',
            ],
            [
                'kode_provinsi' => '36',
                'nama_provinsi' => 'Provinsi Banten',
            ],
            [
                'kode_provinsi' => '51',
                'nama_provinsi' => 'Provinsi Bali',
            ],
            [
                'kode_provinsi' => '52',
                'nama_provinsi' => 'Provinsi Nusa Tenggara Barat',
            ],
            [
                'kode_provinsi' => '53',
                'nama_provinsi' => 'Provinsi Nusa Tenggara Timur',
            ],
            [
                'kode_provinsi' => '61',
                'nama_provinsi' => 'Provinsi Kalimantan Barat',
            ],
            [
                'kode_provinsi' => '62',
                'nama_provinsi' => 'Provinsi Kalimantan Tengah',
            ],
            [
                'kode_provinsi' => '63',
                'nama_provinsi' => 'Provinsi Kalimantan Selatan',
            ],
            [
                'kode_provinsi' => '64',
                'nama_provinsi' => 'Provinsi Kalimantan Timur',
            ],
            [
                'kode_provinsi' => '65',
                'nama_provinsi' => 'Provinsi Kalimantan Utara',
            ],
            [
                'kode_provinsi' => '71',
                'nama_provinsi' => 'Provinsi Sulawesi Utara',
            ],
            [
                'kode_provinsi' => '72',
                'nama_provinsi' => 'Provinsi Sulawesi Tengah',
            ],
            [
                'kode_provinsi' => '73',
                'nama_provinsi' => 'Provinsi Sulawesi Selatan',
            ],
            [
                'kode_provinsi' => '74',
                'nama_provinsi' => 'Provinsi Sulawesi Tenggara',
            ],
            [
                'kode_provinsi' => '75',
                'nama_provinsi' => 'Provinsi Gorontalo',
            ],
            [
                'kode_provinsi' => '76',
                'nama_provinsi' => 'Provinsi Sulawesi Barat',
            ],
            [
                'kode_provinsi' => '81',
                'nama_provinsi' => 'Provinsi Maluku',
            ],
            [
                'kode_provinsi' => '82',
                'nama_provinsi' => 'Provinsi Maluku Utara',
            ],
            [
                'kode_provinsi' => '91',
                'nama_provinsi' => 'Provinsi Papua',
            ],
            [
                'kode_provinsi' => '92',
                'nama_provinsi' => 'Provinsi Papua Barat',
            ],
        ]);
    }
}
