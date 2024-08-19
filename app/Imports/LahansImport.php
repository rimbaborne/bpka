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
                'humas'         => Str::upper($row['humas']) ?? 'ADMIN',
                'user_id'       => $this->userId,              // User yang bertanggung jawab
            ]
        );

        $cekdata = Lahan::where('nomor_notaris', $row['nomor_notaris'])->first();
        $catatan = null;
        if($cekdata) { $catatan = 'Versil sudah dimiliki oleh '.$cekdata->pemilik->nama; }
        $satuan = preg_replace('/[^0-9]/', '', $row['satuan']);
        return new Lahan([
            'nomor_notaris'   => $row['nomor_notaris'],
            'tanggal_notaris' => $row['tanggal_notaris'] ?? '',
            'luas_tanah'      => $satuan ?? 2,
            'jumlah'          => $row['jumlah'] ?? 1,
            'keterangan'      => Str::upper($row['keterangan']) ?? '',
            'terima'          => $row['terima'] ?? '',
            'pemilik_id'      => $pemilik->id,
            'user_id'         => $this->userId,             // User yang bertanggung jawab
            'catatan'         => $catatan ?? '',             // User yang bertanggung jawab
        ]);
    }
}

