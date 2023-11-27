<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PKPT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            padding: 20px;
            /* Sesuaikan dengan kebutuhan padding Anda */
            box-sizing: border-box;
            transform: rotate(-90deg);
        }

        @page {
            size: A4 landscape;
            /* Gaya CSS khusus untuk pengaturan ukuran dan orientasi halaman */
        }

        /* Tambahkan gaya CSS lainnya sesuai kebutuhan Anda */
    </style>

    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            width: 29.7cm;
            /* Ubah width dan height untuk orientasi landscape */
            height: 21cm;
            margin: 0 auto;
            padding: 20px;
            /* Sesuaikan dengan kebutuhan padding Anda */
            box-sizing: border-box;
            transform: rotate(-90deg);
            /* Rotasi untuk orientasi landscape */
            transform-origin: left top;
        }

        @page {
            size: A4 landscape;
            /* Gaya CSS khusus untuk pengaturan ukuran dan orientasi halaman */
        }

        /* Tambahkan gaya CSS lainnya sesuai kebutuhan Anda */
    </style> --}}
</head>

<body style="font-family: Arial, sans-serif;">
    <div style="width: 100%; margin-bottom: 20px;">
        <h3>LAMPIRAN KEPUTUSAN KEPALA DAERAH</h3>
        <p>
            <strong>NOMOR:</strong> _______________ <br>
            <strong>TANGGAL:</strong> 02 JANUARI 2023 <br>
            <strong>TENTANG:</strong> PENETAPAN PROGRAM KERJA PENGAWASAN TAHUNAN (PKPT) BERBASIS RESIKO TAHUN 2023
        </p>
    </div>

    <table border="1" cellspacing="0" cellpadding="5" style="width: 100%;">
        <thead>
            <tr>
                <th rowspan="2">Nomor</th>
                <th rowspan="2">Nama PKPT</th>
                <th rowspan="2">Deskripsi PKPT</th>
                <th rowspan="2">Area Pengawasan</th>
                <th colspan="5">Hari Pengawasan</th>
                <th rowspan="2">Anggaran</th>
                <th rowspan="2">Jumlah Laporan</th>
                <th rowspan="2">Sarana dan Prasarana</th>
                <th rowspan="2">Tingkat Risiko</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr>
                <th>WPJ</th>
                <th>SPV/ PT</th>
                <th>KT</th>
                <th>AT</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['no'] }}</td>
                    <td>{{ $item['namaPkpt'] }}</td>
                    <td>{{ $item['deskripsiPkpt'] }}</td>
                    <td>{{ $item['jumlahHariPengawasanWpj'] }}</td>
                    <td>{{ $item['jumlahHariPengawasanSpv'] }}</td>
                    <td>{{ $item['jumlahHariPengawasanKt'] }}</td>
                    <td>{{ $item['jumlahHariPengawasanAt'] }}</td>
                    <td>{{ $item['jumlahHariPengawasan'] }}</td>
                    <td>{{ $item['anggaranBiaya'] }}</td>
                    <td>{{ $item['jumlahLhpTerbit'] }}</td>
                    <td>{{ $item['kebutuhanSarpras'] }}</td>
                    <td>{{ $item['namaTingkatResiko'] }}</td>
                    <td>{{ $item['keterangan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="width: 100%; margin-bottom: 20px;">
        <h3>Total</h3>
        <p>
            <strong>Total Anggaran:</strong> {{ $totalAnggaran }} <br>
            <strong>TANGGAL:</strong> 02 JANUARI 2023 <br>
            <strong>TENTANG:</strong> PENETAPAN PROGRAM KERJA PENGAWASAN TAHUNAN (PKPT) BERBASIS RESIKO TAHUN 2023
        </p>
    </div>
</body>

</html>
