<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PKPT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        @page {
            size: A4 landscape;
            margin: 1cm;
            /* Margin atas, kanan, bawah, kiri */
            /* Gaya CSS khusus untuk pengaturan ukuran dan orientasi halaman */
        }

        /* Style the rest of your document as needed */
        h3,
        p,
        table,
        div {
            width: 100%;
            max-width: 100%;
            /* Ubah dari 800px menjadi 100% */
            box-sizing: border-box;
        }

        table {
            margin-top: 5px;
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            /* Mengurangi padding agar muat di sisi kanan */
            text-align: left;
            font-size: 10px;
            /* Ukuran font diperkecil */
        }

        h3 {
            font-size: 16px;
            /* Ukuran font diperkecil */
        }

        /* Tambahkan gaya CSS lainnya sesuai kebutuhan Anda */
    </style>
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
                    <td>{{ $item['namaAreaPengawasan'] }}</td>
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
