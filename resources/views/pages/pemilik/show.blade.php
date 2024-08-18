<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pemilik Akta') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">Lihat Data</h3>
                <x-splade-form :default="$data" action="{{ route('dashboard.pemilik.update', ['id' => $data->id]) }}"  class="grid grid-cols-4 gap-4">
                    <x-splade-input class="col-span-full sm:col-span-2" name="nama" label="Nama" />
                    <x-splade-input class="col-span-full sm:col-span-2" name="nik" label="NIK" />
                    <x-splade-input class="col-span-full sm:col-span-2" name="ibu_kandung" label="Ibu Kandung" />
                    <x-splade-input class="col-span-full sm:col-span-2" name="nomor_telepon" label="Kontak" />
                    <x-splade-input class="col-span-full sm:col-span-full" name="alamat" label="Alamat" />
                    <x-splade-file class="col-span-full sm:col-span-2" type="file" name="file_ktp" label="KTP" filepond/>
                    <div class="col-span-full sm:col-span-2"></div>
                    <x-splade-submit class="col-span-full sm:col-span-2" label="Simpan" />
                </x-splade-form>
                <div class="my-10">
                    <label for="">KTP</label>
                    <div class="col-span-full sm:col-span-2">
                        <x-splade-state>
                            @if ($data->ktp)
                                <a href="{{ url('/') }}/storage/{{ $data->ktp }}" target="_blank">
                                    <img src="{{ url('/') }}/storage/{{ $data->ktp }}" class="w-64" alt="{{ $data->nama }}">
                                </a>
                            @endif
                        </x-splade-state>
                    </div>
                </div>
                <div class="flex justify-end">
                <Link method="delete" href="{{ route('dashboard.pemilik.destroy', ['id' => $data->id]) }}" class="text-red-500 hover:text-red-700 border border-red-500 py-1 px-4 mx-1 rounded-md"
                    confirmDanger="Data {{ $data->nama }} Akan Hapus Beserta Akta / Versil Yang Terhubung ?"
                    confirm-text="Data tidak akan kembali"
                    confirm-button="Ya, saya yakin menghapusnya !"
                    cancel-button="Batalkan !"

                    >Hapus  </Link>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex justify-end mb-4">
                    <Link modal href="{{ route('dashboard.akta.create', ['id' => $data->id]) }}" class=" hover:text-indigo-700 text-white bg-indigo-500 hover:bg-white hover:border hover:border-indigo-500 py-2.5 px-4 my-1 rounded-md">
                        Tambah Data Akta
                    </Link>
                </div>
                <h3 class="text-xl font-semibold dark:text-white">Memiliki Akta </h3>
                <h3 class="mb-4 text-md text-gray-500 dark:text-white">Jumlah Surat {{ $data->lahan->count() }} </h3>
                <table class="table-auto w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left" width="5">No</th>
                            <th class="px-4 py-2 text-left">Versil</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Luas Ha</th>
                            <th class="px-4 py-2 text-left">Jumlah</th>
                            <th class="px-4 py-2 text-left">Keterangan</th>
                            <th class="px-4 py-2 text-left">Terima</th>
                            <th class="px-4 py-2 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data->lahan as $key => $lahan)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $key + 1 }}</td>
                                <td class="border px-4 py-2">{{ $lahan->nomor_notaris }}</td>
                                <td class="border px-4 py-2">{{ $lahan->tanggal_notaris }}</td>
                                <td class="border px-4 py-2">{{ $lahan->luas_tanah }}</td>
                                <td class="border px-4 py-2">{{ $lahan->jumlah }}</td>
                                <td class="border px-4 py-2">{{ $lahan->keterangan }}</td>
                                <td class="border px-4 py-2">{{ $lahan->terima }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <Link modal href="{{ route('dashboard.akta.show', ['id' => $data->id, 'notaris' => $lahan->id]) }}" class="text-indigo-500 hover:text-indigo-700 border border-indigo-500 py-1 px-4 my-1 rounded-md">Edit </Link>
                                    <Link method="delete" href="{{ route('dashboard.akta.destroy', ['id' => $data->id, 'notaris' => $lahan->id]) }}" class="text-red-500 hover:text-red-700 border border-red-500 py-1 px-4 mx-1 rounded-md"
                                        confirmDanger="Yakin Di Hapus ?"
                                        confirm-text="Data tidak akan kembali"
                                        confirm-button="Ya, saya yakin menghapusnya !"
                                        cancel-button="Batalkan !"
                                        >Hapus </Link>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
