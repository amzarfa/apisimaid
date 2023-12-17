<?php

namespace App\Exports\Ren;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PkptExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        // return [
        //     'idPkpt',
        //     'idJakwas',
        //     'namaPkpt',
        //     'deskripsiPkpt',
        //     'kodeSubUnitAudit',
        //     'namaSubUnitAudit',
        //     'kodeUnitAudit',
        //     'namaUnitAudit',
        //     'kodeLingkupAudit',
        //     'namaLingkupAudit',
        //     'kodeAreaPengawasan',
        //     'namaAreaPengawasan',
        //     'kodeJenisPengawasan',
        //     'namaJenisPengawasan',
        //     'kodeTingkatResiko',
        //     'namaTingkatResiko',
        //     'kodeBidangObrik',
        //     'namaBidangObrik',
        //     'tahunPkpt',
        //     'rmp',
        //     'rpl',
        //     'jumlahHariPengawasanWpj',
        //     'jumlahHariPengawasanSpv',
        //     'jumlahHariPengawasanKt',
        //     'jumlahHariPengawasanAt',
        //     'jumlahHariPengawasan',
        //     'anggaranBiaya',
        //     'jumlahLhpTerbit',
        //     'kebutuhanSarpras',
        //     'keterangan',
        //     'createdAt',
        //     'updatedAt',
        //     'createdBy',
        //     'updatedBy',
        // ];

        return [
            'idPkpt',
            'idJakwas',
            'namaPkpt',
            'deskripsiPkpt',
            'kodeSubUnitAudit',
            'namaSubUnitAudit',
            'kodeUnitAudit',
            'namaUnitAudit',
            'kodeLingkupAudit',
            'namaLingkupAudit',
            'kodeAreaPengawasan',
            'namaAreaPengawasan',
            'kodeJenisPengawasan',
            'namaJenisPengawasan',
            'kodeTingkatResiko',
            'namaTingkatResiko',
            'kodeBidangObrik',
            'namaBidangObrik',
            'tahunPkpt',
            'rmp',
            'rpl',
            'jumlahHariPengawasanWpj',
            'jumlahHariPengawasanSpv',
            'jumlahHariPengawasanKt',
            'jumlahHariPengawasanAt',
            'jumlahHariPengawasan',
            'anggaranBiaya',
            'jumlahLhpTerbit',
            'kebutuhanSarpras',
            'keterangan',
            'createdAt',
            'updatedAt',
            'createdBy',
            'updatedBy',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $rows = $event->sheet->getDelegate()->toArray();
                $cellRange = 'A1:AH1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $i = 0;
                foreach ($rows as $k => $v) {
                    $i++;
                }
                $event->sheet->getStyle('A1:AH' . $i)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
