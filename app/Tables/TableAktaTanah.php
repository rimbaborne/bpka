<?php

namespace App\Tables;

use App\Models\Lahan as AktaTanah;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class TableAktaTanah extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return AktaTanah::class;
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['nomor_notaris', 'pemilik.nama'])
            ->searchInput(
                key: 'pemilik.humas',
                label: 'Cari Humas ..',
            )
            ->searchInput(
                key: 'pemilik.nama',
                label: 'Cari Nama ..',
            )
            ->searchInput(
                key: 'pemilik.nik',
                label: 'Cari Nik ..',
            )
            ->searchInput(
                key: 'keterangan',
                label: 'Cari Keterangan ..',
            )
            ->searchInput(
                key: 'catatan',
                label: 'Cari Catatan ..',
            )
            ->column(
                key     : 'pemilik.nama',
                label   : 'Nama'
            )
            ->column(
                key     : 'luas_tanah',
                label   : 'Ha'
            )
            ->column(
                key     : 'pemilik.alamat',
                label   : 'Alamat'
            )
            ->column(
                key     : 'pemilik.nik',
                label   : 'NIK'
            )
            ->column(
                key     : 'pemilik.nomor_telepon',
                label   : 'Kontak'
            )
            ->column(
                key     : 'pemilik.ibu_kandung',
                label   : 'Ibu Kandung'
            )
            ->column(
                key     : 'nomor_notaris',
                label   : 'Versil'
            )
            ->column(
                key     : 'tanggal_notaris',
                label   : 'Tanggal'
            )
            ->column(
                key     : 'keterangan',
                label   : 'Keterangan'
            )
            ->column(
                key     : 'terima',
                label   : 'Terima'
            )
            ->column(
                key     : 'catatan',
                label   : 'Catatan'
            )

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            ->export()
            ->paginate(10)
            ;
    }
}
