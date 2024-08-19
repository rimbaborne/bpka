<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pemilik Akta') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="">
                        <div >
                            <h3 class="mb-4 text-xl font-semibold dark:text-white">Tambah Data Pemilik</h3>
                            <x-splade-form action="{{ route('dashboard.pemilik.store') }}"  class="grid grid-cols-4 gap-4">
                                <x-splade-input class="col-span-full sm:col-span-2" name="humas" label="Humas"/>
                                <x-splade-input class="col-span-full sm:col-span-2" name="nama" label="Nama" required/>
                                <x-splade-input class="col-span-full sm:col-span-2" name="nik" label="NIK" />
                                <x-splade-input class="col-span-full sm:col-span-2" name="ibu_kandung" label="Ibu Kandung" />
                                <x-splade-input class="col-span-full sm:col-span-2" name="nomor_telepon" label="Kontak" />
                                <x-splade-input class="col-span-full sm:col-span-full" name="alamat" label="Alamat" required/>
                                <x-splade-file class="col-span-full sm:col-span-2" type="file" name="file_ktp" label="KTP" filepond/>
                                <div class="col-span-full sm:col-span-2"></div>
                                <x-splade-submit class="col-span-full sm:col-span-full" label="Simpan" />
                            </x-splade-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

