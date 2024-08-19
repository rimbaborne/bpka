<?php

namespace App\Exports;

use App\Models\Lahan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AktaExport implements FromArray, WithHeadings,  WithStyles,  ShouldAutoSize, WithEvents
{


    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function  array(): array
    {
        $lahans = Lahan::with('pemilik');

        if (!empty($this->filters['nama'])) {
            $lahans->whereHas('pemilik', function ($query) {
                $query->where('nama', 'like', '%' . $this->filters['nama'] . '%');
            });
        }

        if (!empty($this->filters['alamat'])) {
            $lahans->whereHas('pemilik', function ($query) {
                $query->where('alamat', 'like', '%' . $this->filters['alamat'] . '%');
            });
        }

        if (!empty($this->filters['nik'])) {
            $lahans->whereHas('pemilik', function ($query) {
                $query->where('nik', 'like', '%' . $this->filters['nik'] . '%');
            });
        }

        if (!empty($this->filters['nomor_telepon'])) {
            $lahans->whereHas('pemilik', function ($query) {
                $query->where('nomor_telepon', 'like', '%' . $this->filters['nomor_telepon'] . '%');
            });
        }

        if (!empty($this->filters['nomor_notaris'])) {
            $lahans->where('nomor_notaris', 'like', '%' . $this->filters['nomor_notaris'] . '%');
        }

        if (!empty($this->filters['keterangan'])) {
            $lahans->where('keterangan', $this->filters['keterangan']);
        }

        $lahans = $lahans->get();
        $data = [];
        $currentPemilikId = null;
        static $no = 1;


        foreach ($lahans->groupBy('pemilik_id') as $pemilikId => $groupedLahans) {
            $pemilik = $groupedLahans->first()->pemilik;
            $luasTanahSum = $groupedLahans->sum('luas_tanah');
            $jumlahSuratSum = $groupedLahans->sum('jumlah');

            // Tampilkan pemilik dan akumulasi luas tanah hanya satu kali
            foreach ($groupedLahans as $index => $lahan) {
                if ($index === 0) {
                    // Baris pertama untuk pemilik
                    $data[] = [
                        $no++,
                        $pemilik->humas,
                        $pemilik->nama,
                        $luasTanahSum,
                        $jumlahSuratSum,
                        $pemilik->alamat,
                        $pemilik->nik,
                        $pemilik->nomor_telepon,
                        $pemilik->ibu_kandung,
                        $lahan->nomor_notaris,
                        $lahan->tanggal_notaris,
                        $lahan->keterangan,
                        $lahan->terima,
                        $lahan->catatan
                    ];
                } else {
                    // Baris berikutnya, hanya tampilkan lahan
                    $data[] = [
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        $lahan->nomor_notaris,
                        $lahan->tanggal_notaris,
                        $lahan->keterangan,
                        $lahan->terima,
                        $lahan->catatan

                    ];
                }
            }
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Humas',
            'Nama Pemilik',
            'Luas Ha',
            'Surat',
            'Alamat',
            'NIK',
            'Kontak',
            'Ibu Kandung',
            'Versil',
            'Tanggal',
            'Keterangan',
            'Terima',
            'Catatan'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Heading Bold
            1 => ['font' => ['bold' => true]],

            // Border untuk semua sel
            'A1:L' . $sheet->getHighestRow() => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Apply auto width
                foreach (range('A', $event->sheet->getHighestColumn()) as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
}
