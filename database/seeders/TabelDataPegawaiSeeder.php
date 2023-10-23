<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TabelDataPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199402012020121011', 'nip_lama' => '202100012', 'nama' => 'Muhammad Ivandra', 'nama_dan_gelar' => 'Muhammad Ivandra', 'email' => 'Muhammad.Ivandra@bpkp.go.id', 'tempat_lahir' => 'Jakarta Selatan', 'tgl_lahir' => '34366', 'jenis_kelamin' => 'Laki-laki', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199511062020122020', 'nip_lama' => '202100013', 'nama' => 'Muthia Priyanti', 'nama_dan_gelar' => 'Muthia Priyanti', 'email' => 'Muthia.Priyanti@bpkp.go.id', 'tempat_lahir' => 'Jakarta', 'tgl_lahir' => '35009', 'jenis_kelamin' => 'Perempuan', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199406182020121007', 'nip_lama' => '202100016', 'nama' => 'Muhammad Galang Abdullah', 'nama_dan_gelar' => 'Muhammad Galang Abdullah', 'email' => 'Galang.Abdullah@bpkp.go.id', 'tempat_lahir' => 'Bogor', 'tgl_lahir' => '34503', 'jenis_kelamin' => 'Laki-laki', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199708062020122007', 'nip_lama' => '202100021', 'nama' => 'Astrid Shofi Dzihni Riesta', 'nama_dan_gelar' => 'Astrid Shofi Dzihni Riesta', 'email' => 'Astrid.Shofi@bpkp.go.id', 'tempat_lahir' => 'Bandung', 'tgl_lahir' => '35648', 'jenis_kelamin' => 'Perempuan', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199705232020122007', 'nip_lama' => '202100031', 'nama' => 'Fitwatur Adelia Rosyida', 'nama_dan_gelar' => 'Fitwatur Adelia Rosyida', 'email' => 'Fitwatur.Rosyida@bpkp.go.id', 'tempat_lahir' => 'Gresik', 'tgl_lahir' => '35573', 'jenis_kelamin' => 'Perempuan', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199403142020122007', 'nip_lama' => '202100127', 'nama' => 'Atika Fitri Anugrahani', 'nama_dan_gelar' => 'Atika Fitri Anugrahani, S.Kom.', 'email' => 'Atika.Fitri@bpkp.go.id', 'tempat_lahir' => 'Blora', 'tgl_lahir' => '34407', 'jenis_kelamin' => 'Perempuan', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199802112020122005', 'nip_lama' => '202100128', 'nama' => 'Tiara Sabrina', 'nama_dan_gelar' => 'Tiara Sabrina', 'email' => 'Tiara.Sabrina@bpkp.go.id', 'tempat_lahir' => 'Jambi', 'tgl_lahir' => '35837', 'jenis_kelamin' => 'Perempuan', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199209162020121007', 'nip_lama' => '202100130', 'nama' => 'Muhammad Amzar Fadliatma Putra', 'nama_dan_gelar' => 'Muhammad Amzar Fadliatma Putra, S.Kom.', 'email' => 'Amzar@bpkp.go.id', 'tempat_lahir' => 'Jakarta', 'tgl_lahir' => '33863', 'jenis_kelamin' => 'Laki-laki', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199801012020121003', 'nip_lama' => '202100134', 'nama' => 'Gugun Mediamer', 'nama_dan_gelar' => 'Gugun Mediamer', 'email' => 'Gugunm@bpkp.go.id', 'tempat_lahir' => 'Lebak', 'tgl_lahir' => '35796', 'jenis_kelamin' => 'Laki-laki', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199609022020122014', 'nip_lama' => '202100135', 'nama' => 'Viqha Felayati', 'nama_dan_gelar' => 'Viqha Felayati', 'email' => 'Viqha.Felayati@bpkp.go.id', 'tempat_lahir' => 'Lebak', 'tgl_lahir' => '35310', 'jenis_kelamin' => 'Perempuan', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
            ['kode_sub_unit_audit' => '160500', 'kode_unit_audit' => '1605', 'nip' => '199508012020121004', 'nip_lama' => '202100136', 'nama' => 'Azmil Umur', 'nama_dan_gelar' => 'Azmil Umur', 'email' => 'Azmil.Umur@bpkp.go.id', 'tempat_lahir' => 'Empat Lawang', 'tgl_lahir' => '34912', 'jenis_kelamin' => 'Laki-laki', 'golongan_ruang' => 'Penata Muda, III/a', 'nama_pangkat' => 'Pranata Komputer Pertama', 'jabatan' => 'Pranata Komputer Pertama'],
        ];

        // Ubah nama tabel sesuai dengan tabel yang digunakan
        $tableName = 'tr_data_pegawai';

        $chunkSize = 100; // Ukuran setiap batch

        // Membagi data ke dalam batch
        $chunks = array_chunk($data, $chunkSize);

        foreach ($chunks as $chunk) {
            // Memasukkan data ke dalam tabel dengan insert
            DB::table($tableName)->insert($chunk);
        }
    }
}
