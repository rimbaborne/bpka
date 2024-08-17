<?php

namespace App\Imports;

use App\Models\Lahan;
use App\Models\Pemilik;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon;

class LahansImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row`
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function model(array $row)
    {
        $pemilik = Pemilik::firstOrCreate(
            ['nama' => $row['nama'], 'alamat' => $row['alamat']],
            [
                'nik'           => $row['nik'] ?? '0',                // Sesuaikan dengan data yang ada
                'ibu_kandung'   => $row['ibu_kandung'] ?? '',
                'nomor_telepon' => $row['nomor_telepon'] ?? '',
                'keterangan'    => $row['keterangan'] ?? '',
                'humas'         => $row['humas'] ?? 'admin',
                'user_id'       => $this->userId,              // User yang bertanggung jawab
            ]
        );

        $nomorNotaris = $row['no_notaris'] ?? '';
        if ($nomorNotaris) {
            $lahans = Lahan::where('nomor_notaris', $nomorNotaris)->get();
            if ($lahans->isEmpty()) {
                $satuan = preg_replace('/[^0-9]/', '', $row['satuan']);
                return new Lahan([
                    'nomor_notaris'   => $nomorNotaris,
                    'tanggal_notaris' => $row['tanggal_notaris'] ? Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_notaris']))->format('Y-m-d') : '',
                    'luas_tanah'      => $satuan,
                    'jumlah'          => $row['jumlah'] ?? '',
                    'keterangan'      => Str::upper($row['keterangan']) ?? '',
                    'terima'          => $row['terima'] ?? '',
                    'pemilik_id'      => $pemilik->id,
                    'user_id'         => $this->userId,             // User yang bertanggung jawab
                ]);
            }
        }
    }
}

