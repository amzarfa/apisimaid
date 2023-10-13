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
            ['kode_bidang_obrik' => '319801001', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Kesejahteraan Rakyat',],
            ['kode_bidang_obrik' => '319801002', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Hukum',],
            ['kode_bidang_obrik' => '319801003', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Perekonomian dan Sumber Daya Alam',],
            ['kode_bidang_obrik' => '319801004', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Pengadaan Barang dan Jasa',],
            ['kode_bidang_obrik' => '319801005', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Administrasi Pembangunan',],
            ['kode_bidang_obrik' => '319801006', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Organisasi',],
            ['kode_bidang_obrik' => '319801007', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Umum',],
            ['kode_bidang_obrik' => '319801008', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Protokol dan Komunikasi Pimpinan',],
            ['kode_bidang_obrik' => '319801009', 'kode_unit_obrik' => '319801', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Bagian Pemerintahan',],
            ['kode_bidang_obrik' => '319802001', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pendidikan',],
            ['kode_bidang_obrik' => '319802002', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Kepemudaan dan Olahraga',],
            ['kode_bidang_obrik' => '319802003', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Kearsipan dan Perpustakaan',],
            ['kode_bidang_obrik' => '319802004', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pertanian',],
            ['kode_bidang_obrik' => '319802005', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Komunikasi dan Informatika',],
            ['kode_bidang_obrik' => '319802006', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',],
            ['kode_bidang_obrik' => '319802007', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Lingkungan Hidup',],
            ['kode_bidang_obrik' => '319802008', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Kesehatan',],
            ['kode_bidang_obrik' => '319802009', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pekerjaan Umum dan Penataan Ruang',],
            ['kode_bidang_obrik' => '319802010', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Perumahan dan Kawasan Permukiman',],
            ['kode_bidang_obrik' => '319802011', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Ketahanan Pangan',],
            ['kode_bidang_obrik' => '319802012', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Kependudukan dan Pencatatan Sipil',],
            ['kode_bidang_obrik' => '319802013', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pengendalian Penduduk dan Keluarga Berencana',],
            ['kode_bidang_obrik' => '319802014', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Perindustrian, Koperasi, Usaha Kecil dan Menengah',],
            ['kode_bidang_obrik' => '319802015', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Perdagangan',],
            ['kode_bidang_obrik' => '319802016', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Perikanan',],
            ['kode_bidang_obrik' => '319802017', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Sosial',],
            ['kode_bidang_obrik' => '319802018', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Tenaga Kerja',],
            ['kode_bidang_obrik' => '319802019', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Perhubungan',],
            ['kode_bidang_obrik' => '319802020', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pariwisata',],
            ['kode_bidang_obrik' => '319802021', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',],
            ['kode_bidang_obrik' => '319802022', 'kode_unit_obrik' => '319802', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Dinas Pemadam Kebakaran',],
            ['kode_bidang_obrik' => '319803001', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Badan Keuangan Daerah',],
            ['kode_bidang_obrik' => '319803003', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia',],
            ['kode_bidang_obrik' => '319803004', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Badan Perencanaan Dan Pembangunan Daerah',],
            ['kode_bidang_obrik' => '319803005', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Badan Penelitian Dan Pengembangan',],
            ['kode_bidang_obrik' => '319803006', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Badan Kesatuan Bangsa dan Politik',],
            ['kode_bidang_obrik' => '319803007', 'kode_unit_obrik' => '319803', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Badan Penanggulangan Bencana Daerah',],
            ['kode_bidang_obrik' => '319804001', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Ampenan',],
            ['kode_bidang_obrik' => '319804002', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Cakranegara',],
            ['kode_bidang_obrik' => '319804003', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Babakan',],
            ['kode_bidang_obrik' => '319804004', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Karang Pule',],
            ['kode_bidang_obrik' => '319804005', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Karang Taliwang',],
            ['kode_bidang_obrik' => '319804006', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Mataram',],
            ['kode_bidang_obrik' => '319804007', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Dasan Agung',],
            ['kode_bidang_obrik' => '319804008', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Pagesangan',],
            ['kode_bidang_obrik' => '319804009', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Tanjung Karang',],
            ['kode_bidang_obrik' => '319804010', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Selaparang',],
            ['kode_bidang_obrik' => '319804011', 'kode_unit_obrik' => '319804', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Puskesmas Pejeruk',],
            ['kode_bidang_obrik' => '319805001', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kecamatan Ampenan',],
            ['kode_bidang_obrik' => '319805002', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kecamatan Sekarbela',],
            ['kode_bidang_obrik' => '319805003', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kecamatan Selaparang',],
            ['kode_bidang_obrik' => '319805004', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kecamatan Mataram',],
            ['kode_bidang_obrik' => '319805005', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kecamatan Cakranegara',],
            ['kode_bidang_obrik' => '319805006', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kecamatan Sandubaya',],
            ['kode_bidang_obrik' => '319805007', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pagesangan Barat',],
            ['kode_bidang_obrik' => '319805008', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pagutan Barat',],
            ['kode_bidang_obrik' => '319805009', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Mandalika',],
            ['kode_bidang_obrik' => '319805010', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pagesangan Timur',],
            ['kode_bidang_obrik' => '319805011', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Monjok Barat',],
            ['kode_bidang_obrik' => '319805012', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pagutan Timur',],
            ['kode_bidang_obrik' => '319805013', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Mayura',],
            ['kode_bidang_obrik' => '319805014', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Tanjung Karang Permai',],
            ['kode_bidang_obrik' => '319805015', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Tanjung Karang',],
            ['kode_bidang_obrik' => '319805016', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Ampenan Utara',],
            ['kode_bidang_obrik' => '319805017', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Kebun Sari',],
            ['kode_bidang_obrik' => '319805018', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Karang Taliwang',],
            ['kode_bidang_obrik' => '319805019', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Selagalas',],
            ['kode_bidang_obrik' => '319805020', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Cakranegara Selatan',],
            ['kode_bidang_obrik' => '319805021', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Cakranegara Utara',],
            ['kode_bidang_obrik' => '319805022', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Sapta Marga',],
            ['kode_bidang_obrik' => '319805023', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Cilinaya',],
            ['kode_bidang_obrik' => '319805024', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Sayang-Sayang',],
            ['kode_bidang_obrik' => '319805025', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Bertais',],
            ['kode_bidang_obrik' => '319805026', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pagesangan',],
            ['kode_bidang_obrik' => '319805027', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pejeruk',],
            ['kode_bidang_obrik' => '319805028', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Banjar',],
            ['kode_bidang_obrik' => '319805029', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pejanggik',],
            ['kode_bidang_obrik' => '319805030', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Dayan Peken',],
            ['kode_bidang_obrik' => '319805031', 'kode_unit_obrik' => '319805', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Kelurahan Pagutan',],
            ['kode_bidang_obrik' => '319806001', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Taman Kanak-Kanak',],
            ['kode_bidang_obrik' => '319806002', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Sekolah Dasar',],
            ['kode_bidang_obrik' => '319806003', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Sekolah Menengah',],
            ['kode_bidang_obrik' => '319806004', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Sekolah Luar Biasa',],
            ['kode_bidang_obrik' => '319806005', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 4 Mataram',],
            ['kode_bidang_obrik' => '319806006', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 49 Cakranegara',],
            ['kode_bidang_obrik' => '319806008', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 10 Mataram',],
            ['kode_bidang_obrik' => '319806009', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 18 Mataram',],
            ['kode_bidang_obrik' => '319806010', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 3 Mataram',],
            ['kode_bidang_obrik' => '319806011', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 4 Bajur',],
            ['kode_bidang_obrik' => '319806012', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 12 Ampenan',],
            ['kode_bidang_obrik' => '319806013', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 14 Ampenan',],
            ['kode_bidang_obrik' => '319806014', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 40 Ampenan',],
            ['kode_bidang_obrik' => '319806015', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 42 Mataram',],
            ['kode_bidang_obrik' => '319806016', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 3 Mataram',],
            ['kode_bidang_obrik' => '319806017', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 44 Ampenan',],
            ['kode_bidang_obrik' => '319806018', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 03 Ampenan',],
            ['kode_bidang_obrik' => '319806019', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 15 Mataram',],
            ['kode_bidang_obrik' => '319806020', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 12 Mataram',],
            ['kode_bidang_obrik' => '319806021', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 5 Mataram',],
            ['kode_bidang_obrik' => '319806022', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 50 Cakranegara',],
            ['kode_bidang_obrik' => '319806023', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 46 Mataram',],
            ['kode_bidang_obrik' => '319806024', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 15 Mataram',],
            ['kode_bidang_obrik' => '319806025', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 37 Ampenan',],
            ['kode_bidang_obrik' => '319806026', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 12 Mataram',],
            ['kode_bidang_obrik' => '319806027', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 13 Mataram',],
            ['kode_bidang_obrik' => '319806028', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 37 Mataram',],
            ['kode_bidang_obrik' => '319806029', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 8 Mataram',],
            ['kode_bidang_obrik' => '319806030', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 40 Mataram',],
            ['kode_bidang_obrik' => '319806031', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 10 Mataram',],
            ['kode_bidang_obrik' => '319806032', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 12 Mataram',],
            ['kode_bidang_obrik' => '319806033', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 08 Mataram',],
            ['kode_bidang_obrik' => '319806034', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 35 Mataram',],
            ['kode_bidang_obrik' => '319806035', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 34 Mataram',],
            ['kode_bidang_obrik' => '319806036', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 44 Mataram',],
            ['kode_bidang_obrik' => '319806037', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 24 Mataram',],
            ['kode_bidang_obrik' => '319806038', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 14 Mataram',],
            ['kode_bidang_obrik' => '319806039', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 31 Mataram',],
            ['kode_bidang_obrik' => '319806040', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SDN 32 Mataram',],
            ['kode_bidang_obrik' => '319806041', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 1 Mataram',],
            ['kode_bidang_obrik' => '319806042', 'kode_unit_obrik' => '319806', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'SMPN 16 Mataram',],
            ['kode_bidang_obrik' => '319810001', 'kode_unit_obrik' => '319807', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Inspektorat',],
            ['kode_bidang_obrik' => '319810002', 'kode_unit_obrik' => '319807', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Satuan Polisi Pamong Praja',],
            ['kode_bidang_obrik' => '319810003', 'kode_unit_obrik' => '319807', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Sekretariat DPRD',],
            ['kode_bidang_obrik' => '319811001', 'kode_unit_obrik' => '319808', 'kode_unit_audit' => '3198', 'nama_bidang_obrik' => 'Rumah Sakit Umum Daerah Kelas B',],
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
