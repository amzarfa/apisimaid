<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeBidangObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_bidang_obrik' => '160501001', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Kesejahteraan Rakyat',],
            ['kode_bidang_obrik' => '160501002', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Hukum',],
            ['kode_bidang_obrik' => '160501003', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Perekonomian dan Sumber Daya Alam',],
            ['kode_bidang_obrik' => '160501004', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Pengadaan Barang dan Jasa',],
            ['kode_bidang_obrik' => '160501005', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Administrasi Pembangunan',],
            ['kode_bidang_obrik' => '160501006', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Organisasi',],
            ['kode_bidang_obrik' => '160501007', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Umum',],
            ['kode_bidang_obrik' => '160501008', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Protokol dan Komunikasi Pimpinan',],
            ['kode_bidang_obrik' => '160501009', 'kode_unit_obrik' => '160501', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Bagian Pemerintahan',],
            ['kode_bidang_obrik' => '160502001', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pendidikan',],
            ['kode_bidang_obrik' => '160502002', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Kepemudaan dan Olahraga',],
            ['kode_bidang_obrik' => '160502003', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Kearsipan dan Perpustakaan',],
            ['kode_bidang_obrik' => '160502004', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pertanian',],
            ['kode_bidang_obrik' => '160502005', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Komunikasi dan Informatika',],
            ['kode_bidang_obrik' => '160502006', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',],
            ['kode_bidang_obrik' => '160502007', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Lingkungan Hidup',],
            ['kode_bidang_obrik' => '160502008', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Kesehatan',],
            ['kode_bidang_obrik' => '160502009', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pekerjaan Umum dan Penataan Ruang',],
            ['kode_bidang_obrik' => '160502010', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Perumahan dan Kawasan Permukiman',],
            ['kode_bidang_obrik' => '160502011', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Ketahanan Pangan',],
            ['kode_bidang_obrik' => '160502012', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Kependudukan dan Pencatatan Sipil',],
            ['kode_bidang_obrik' => '160502013', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pengendalian Penduduk dan Keluarga Berencana',],
            ['kode_bidang_obrik' => '160502014', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Perindustrian, Koperasi, Usaha Kecil dan Menengah',],
            ['kode_bidang_obrik' => '160502015', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Perdagangan',],
            ['kode_bidang_obrik' => '160502016', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Perikanan',],
            ['kode_bidang_obrik' => '160502017', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Sosial',],
            ['kode_bidang_obrik' => '160502018', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Tenaga Kerja',],
            ['kode_bidang_obrik' => '160502019', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Perhubungan',],
            ['kode_bidang_obrik' => '160502020', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pariwisata',],
            ['kode_bidang_obrik' => '160502021', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',],
            ['kode_bidang_obrik' => '160502022', 'kode_unit_obrik' => '160502', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Dinas Pemadam Kebakaran',],
            ['kode_bidang_obrik' => '160503001', 'kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Badan Keuangan Daerah',],
            ['kode_bidang_obrik' => '160503003', 'kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia',],
            ['kode_bidang_obrik' => '160503004', 'kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Badan Perencanaan Dan Pembangunan Daerah',],
            ['kode_bidang_obrik' => '160503005', 'kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Badan Penelitian Dan Pengembangan',],
            ['kode_bidang_obrik' => '160503006', 'kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Badan Kesatuan Bangsa dan Politik',],
            ['kode_bidang_obrik' => '160503007', 'kode_unit_obrik' => '160503', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Badan Penanggulangan Bencana Daerah',],
            ['kode_bidang_obrik' => '160504001', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Ampenan',],
            ['kode_bidang_obrik' => '160504002', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Cakranegara',],
            ['kode_bidang_obrik' => '160504003', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Babakan',],
            ['kode_bidang_obrik' => '160504004', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Karang Pule',],
            ['kode_bidang_obrik' => '160504005', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Karang Taliwang',],
            ['kode_bidang_obrik' => '160504006', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Mataram',],
            ['kode_bidang_obrik' => '160504007', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Dasan Agung',],
            ['kode_bidang_obrik' => '160504008', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Pagesangan',],
            ['kode_bidang_obrik' => '160504009', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Tanjung Karang',],
            ['kode_bidang_obrik' => '160504010', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Selaparang',],
            ['kode_bidang_obrik' => '160504011', 'kode_unit_obrik' => '160504', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Puskesmas Pejeruk',],
            ['kode_bidang_obrik' => '160505001', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kecamatan Ampenan',],
            ['kode_bidang_obrik' => '160505002', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kecamatan Sekarbela',],
            ['kode_bidang_obrik' => '160505003', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kecamatan Selaparang',],
            ['kode_bidang_obrik' => '160505004', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kecamatan Mataram',],
            ['kode_bidang_obrik' => '160505005', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kecamatan Cakranegara',],
            ['kode_bidang_obrik' => '160505006', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kecamatan Sandubaya',],
            ['kode_bidang_obrik' => '160505007', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pagesangan Barat',],
            ['kode_bidang_obrik' => '160505008', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pagutan Barat',],
            ['kode_bidang_obrik' => '160505009', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Mandalika',],
            ['kode_bidang_obrik' => '160505010', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pagesangan Timur',],
            ['kode_bidang_obrik' => '160505011', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Monjok Barat',],
            ['kode_bidang_obrik' => '160505012', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pagutan Timur',],
            ['kode_bidang_obrik' => '160505013', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Mayura',],
            ['kode_bidang_obrik' => '160505014', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Tanjung Karang Permai',],
            ['kode_bidang_obrik' => '160505015', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Tanjung Karang',],
            ['kode_bidang_obrik' => '160505016', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Ampenan Utara',],
            ['kode_bidang_obrik' => '160505017', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Kebun Sari',],
            ['kode_bidang_obrik' => '160505018', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Karang Taliwang',],
            ['kode_bidang_obrik' => '160505019', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Selagalas',],
            ['kode_bidang_obrik' => '160505020', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Cakranegara Selatan',],
            ['kode_bidang_obrik' => '160505021', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Cakranegara Utara',],
            ['kode_bidang_obrik' => '160505022', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Sapta Marga',],
            ['kode_bidang_obrik' => '160505023', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Cilinaya',],
            ['kode_bidang_obrik' => '160505024', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Sayang-Sayang',],
            ['kode_bidang_obrik' => '160505025', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Bertais',],
            ['kode_bidang_obrik' => '160505026', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pagesangan',],
            ['kode_bidang_obrik' => '160505027', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pejeruk',],
            ['kode_bidang_obrik' => '160505028', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Banjar',],
            ['kode_bidang_obrik' => '160505029', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pejanggik',],
            ['kode_bidang_obrik' => '160505030', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Dayan Peken',],
            ['kode_bidang_obrik' => '160505031', 'kode_unit_obrik' => '160505', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Kelurahan Pagutan',],
            ['kode_bidang_obrik' => '160506001', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Taman Kanak-Kanak',],
            ['kode_bidang_obrik' => '160506002', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Sekolah Dasar',],
            ['kode_bidang_obrik' => '160506003', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Sekolah Menengah',],
            ['kode_bidang_obrik' => '160506004', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Sekolah Luar Biasa',],
            ['kode_bidang_obrik' => '160506005', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 4 Mataram',],
            ['kode_bidang_obrik' => '160506006', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 49 Cakranegara',],
            ['kode_bidang_obrik' => '160506008', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 10 Mataram',],
            ['kode_bidang_obrik' => '160506009', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 18 Mataram',],
            ['kode_bidang_obrik' => '160506010', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 3 Mataram',],
            ['kode_bidang_obrik' => '160506011', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 4 Bajur',],
            ['kode_bidang_obrik' => '160506012', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 12 Ampenan',],
            ['kode_bidang_obrik' => '160506013', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 14 Ampenan',],
            ['kode_bidang_obrik' => '160506014', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 40 Ampenan',],
            ['kode_bidang_obrik' => '160506015', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 42 Mataram',],
            ['kode_bidang_obrik' => '160506016', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 3 Mataram',],
            ['kode_bidang_obrik' => '160506017', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 44 Ampenan',],
            ['kode_bidang_obrik' => '160506018', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 03 Ampenan',],
            ['kode_bidang_obrik' => '160506019', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 15 Mataram',],
            ['kode_bidang_obrik' => '160506020', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 12 Mataram',],
            ['kode_bidang_obrik' => '160506021', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 5 Mataram',],
            ['kode_bidang_obrik' => '160506022', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 50 Cakranegara',],
            ['kode_bidang_obrik' => '160506023', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 46 Mataram',],
            ['kode_bidang_obrik' => '160506024', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 15 Mataram',],
            ['kode_bidang_obrik' => '160506025', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 37 Ampenan',],
            ['kode_bidang_obrik' => '160506026', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 12 Mataram',],
            ['kode_bidang_obrik' => '160506027', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 13 Mataram',],
            ['kode_bidang_obrik' => '160506028', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 37 Mataram',],
            ['kode_bidang_obrik' => '160506029', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 8 Mataram',],
            ['kode_bidang_obrik' => '160506030', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 40 Mataram',],
            ['kode_bidang_obrik' => '160506031', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 10 Mataram',],
            ['kode_bidang_obrik' => '160506032', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 12 Mataram',],
            ['kode_bidang_obrik' => '160506033', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 08 Mataram',],
            ['kode_bidang_obrik' => '160506034', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 35 Mataram',],
            ['kode_bidang_obrik' => '160506035', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 34 Mataram',],
            ['kode_bidang_obrik' => '160506036', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 44 Mataram',],
            ['kode_bidang_obrik' => '160506037', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 24 Mataram',],
            ['kode_bidang_obrik' => '160506038', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 14 Mataram',],
            ['kode_bidang_obrik' => '160506039', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 31 Mataram',],
            ['kode_bidang_obrik' => '160506040', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SDN 32 Mataram',],
            ['kode_bidang_obrik' => '160506041', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 1 Mataram',],
            ['kode_bidang_obrik' => '160506042', 'kode_unit_obrik' => '160506', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'SMPN 16 Mataram',],
            ['kode_bidang_obrik' => '160507001', 'kode_unit_obrik' => '160507', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Inspektorat',],
            ['kode_bidang_obrik' => '160507002', 'kode_unit_obrik' => '160507', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Satuan Polisi Pamong Praja',],
            ['kode_bidang_obrik' => '160507003', 'kode_unit_obrik' => '160507', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Sekretariat DPRD',],
            ['kode_bidang_obrik' => '160508001', 'kode_unit_obrik' => '160508', 'kode_unit_audit' => '1605', 'nama_bidang_obrik' => 'Rumah Sakit Umum Daerah Kelas B',],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_kode_bidang_obrik';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
