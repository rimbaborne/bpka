<?php

namespace App\Tables;

use App\Models\Pemilik;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class TablePemilik extends AbstractTable
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
        return Pemilik::class;
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
            ->withGlobalSearch(columns: ['nama', 'alamat', 'nik', 'ibu_kandung', 'nomor_telepon', 'humas'])
            ->rowLink(fn (Pemilik $pemilik) => route('dashboard.pemilik.show', ['id' => $pemilik->id]))
            ->searchInput(
                key: 'nama',
                label: 'Cari Nama',
            )
            ->searchInput(
                key: 'alamat',
                label: 'Cari Alamat',
            )
            ->searchInput(
                key: 'nik',
                label: 'Cari NIK',
            )
            ->searchInput(
                key: 'ibu_kandung',
                label: 'Cari Ibu Kandung',
            )
            ->searchInput(
                key: 'nomor_telepon',
                label: 'Cari Nomor Telepon',
            )
            ->searchInput(
                key: 'humas',
                label: 'Cari Humas',
            )
            ->column(
                key     : 'humas',
                label   : 'Humas'
            )
            ->column(
                key     : 'nama',
                label   : 'Nama'
            )
            ->column(
                key     : 'alamat',
                label   : 'Alamat'
            )
            ->column(
                key     : 'nik',
                label   : 'NIK'
            )
            ->column(
                key     : 'ibu_kandung',
                label   : 'Ibu Kandung'
            )
            ->column(
                key     : 'nomor_telepon',
                label   : 'Kontak'
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
