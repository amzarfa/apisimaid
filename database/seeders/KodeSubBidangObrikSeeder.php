<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeSubBidangObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_sub_bidang_obrik' => '319803001001', 'kode_bidang_obrik' => '319803001', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'Grand Legi Hotel',],
            ['kode_sub_bidang_obrik' => '319803001002', 'kode_bidang_obrik' => '319803001', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'Lombok Raya Hotel',],
            ['kode_sub_bidang_obrik' => '319805004006', 'kode_bidang_obrik' => '319805004', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'Kelurahan Pagesangan Timur',],
            ['kode_sub_bidang_obrik' => '319805004007', 'kode_bidang_obrik' => '319805004', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'Kelurahan Pagutan Barat',],
            ['kode_sub_bidang_obrik' => '319805005009', 'kode_bidang_obrik' => '319805005', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'Kelurahan Karang Taliwang',],
            ['kode_sub_bidang_obrik' => '319806001001', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TKN Pembina Mataram',],
            ['kode_sub_bidang_obrik' => '319806001002', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TKN Pembina Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001003', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TKN Pembina Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001004', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Negeri Model Mataram',],
            ['kode_sub_bidang_obrik' => '319806001005', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'RA Muslimat NW Mataram',],
            ['kode_sub_bidang_obrik' => '319806001006', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Adhyaksa 23 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001007', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Aisyiyah Bustanul Athfal 2 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001008', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Aisyiyah Bustanul Athfal 3 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001009', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Aisyiyah Bustanul Athfal 5 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001010', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Aisyiyah Bustanul Athfal 6 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001011', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Aisyiyah Bustanul Athfal Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001012', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Al Hamidy Pagutan',],
            ['kode_sub_bidang_obrik' => '319806001013', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Al Hidayah Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001014', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Al Iqra',],
            ['kode_sub_bidang_obrik' => '319806001015', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Al-Hilal',],
            ['kode_sub_bidang_obrik' => '319806001016', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Amdani Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001017', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Angkasa Rembiga',],
            ['kode_sub_bidang_obrik' => '319806001018', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Assidiqi Mataram',],
            ['kode_sub_bidang_obrik' => '319806001019', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Barunawati Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001020', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Bayangkari Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001021', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Berstandar Internasional Mataram',],
            ['kode_sub_bidang_obrik' => '319806001022', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Bhakti Ibu Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001023', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Bhakti Insani',],
            ['kode_sub_bidang_obrik' => '319806001024', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Bhineka SKB Mataram',],
            ['kode_sub_bidang_obrik' => '319806001025', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dahlia Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001026', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dahlia Rembiga',],
            ['kode_sub_bidang_obrik' => '319806001027', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dewi Seruni Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001028', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dharma Wanita I Mataram',],
            ['kode_sub_bidang_obrik' => '319806001029', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dharma Wanita III Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001030', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dharma Wanita III Mataram',],
            ['kode_sub_bidang_obrik' => '319806001031', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dharma Wanita Seroja Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001032', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Don Bosco Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001033', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dwi Jendra',],
            ['kode_sub_bidang_obrik' => '319806001034', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK DWP. Dikpora Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001035', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Hang Tuah Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001036', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Idhata Mataram',],
            ['kode_sub_bidang_obrik' => '319806001037', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Kartika Gebang',],
            ['kode_sub_bidang_obrik' => '319806001038', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Kartini Mataram',],
            ['kode_sub_bidang_obrik' => '319806001039', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Masyitah Dasan Agung Mataram',],
            ['kode_sub_bidang_obrik' => '319806001040', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Pembina NW Mataram',],
            ['kode_sub_bidang_obrik' => '319806001041', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Mitra Bangsa Mataram',],
            ['kode_sub_bidang_obrik' => '319806001042', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Nurul Iman Sekarbela',],
            ['kode_sub_bidang_obrik' => '319806001043', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Permata Hati Islamic Preschool',],
            ['kode_sub_bidang_obrik' => '319806001044', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Pertiwi Mataram',],
            ['kode_sub_bidang_obrik' => '319806001045', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Pertiwi Monjok',],
            ['kode_sub_bidang_obrik' => '319806001046', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Perwanida I Mataram',],
            ['kode_sub_bidang_obrik' => '319806001047', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 1 Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001048', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 1 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001049', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 2 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001050', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 4 Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001051', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 4 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001052', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 5 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001053', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI 6 Mataram',],
            ['kode_sub_bidang_obrik' => '319806001054', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK PGRI Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001055', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Putra I Mataram',],
            ['kode_sub_bidang_obrik' => '319806001056', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Raudatush Shibyan',],
            ['kode_sub_bidang_obrik' => '319806001057', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Sandityas Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001058', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Saraswati Mataram',],
            ['kode_sub_bidang_obrik' => '319806001059', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK SD SDN 8 Cakranegara',],
            ['kode_sub_bidang_obrik' => '319806001060', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Seruni Mataram',],
            ['kode_sub_bidang_obrik' => '319806001061', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK St. Antonius Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001062', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Tarbiyatul Ummah Mataram',],
            ['kode_sub_bidang_obrik' => '319806001063', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Tunas Bangsa Mataram',],
            ['kode_sub_bidang_obrik' => '319806001064', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Tunas Harapan Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001065', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Tunjung Sari Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001066', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK YPRU Mataram',],
            ['kode_sub_bidang_obrik' => '319806001067', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Fathul Mubi`in Getap',],
            ['kode_sub_bidang_obrik' => '319806001068', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Alang-Alang Sekarbela',],
            ['kode_sub_bidang_obrik' => '319806001069', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Cahya Ananda',],
            ['kode_sub_bidang_obrik' => '319806001070', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK Dharma Wanita Seruni Ampenan',],
            ['kode_sub_bidang_obrik' => '319806001071', 'kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'TK DWP. Prov. NTB',],
            ['kode_sub_bidang_obrik' => '319806003004', 'kode_bidang_obrik' => '319806003', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'SMPN 4 Mataram',],
            ['kode_sub_bidang_obrik' => '319806003010', 'kode_bidang_obrik' => '319806003', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'SMPN 10 Mataram',],
            ['kode_sub_bidang_obrik' => '319806003018', 'kode_bidang_obrik' => '319806003', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'SMPN 18 Mataram',],
            ['kode_sub_bidang_obrik' => '319806004001', 'kode_bidang_obrik' => '319806004', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_sub_bidang_obrik' => 'SLBN Pembina Mataram',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_sub_bidang_obrik';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
