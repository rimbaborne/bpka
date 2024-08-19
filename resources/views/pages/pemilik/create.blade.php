<x-splade-modal max-width="4xl">
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
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
</x-splade-modal>

