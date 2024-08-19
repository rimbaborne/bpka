<x-splade-modal max-width="4xl">
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">Tambah Data Akta</h3>
        <x-splade-form  action="{{ route('dashboard.akta.store', ['id' => $id]) }}"  class="grid grid-cols-4 gap-4"
                    :default="[
                                'luas_tanah' => 2,
                                'jumlah' => 1,
                                'terima' => 'Kota Balikpapan'
                            ]"
                    >
            <x-splade-input class="col-span-full sm:col-span-2" name="nomor_notaris" label="Nomor Notaris" />
            <x-splade-input class="col-span-full sm:col-span-2" name="tanggal_notaris" label="Tanggal Notaris" date/>
            <x-splade-input class="col-span-full sm:col-span-2" name="luas_tanah" label="Satua (Ha)" type="number" />
            <x-splade-input class="col-span-full sm:col-span-2" name="jumlah" label="Jumlah" type="number" />
            <x-splade-select class="col-span-full sm:col-span-2" name="keterangan" label="Keterangan">
                <option value="LIMPAHAN">LIMPAHAN</option>
                <option value="PEMILIK">PEMILIK</option>
                <option value="DILIMPAHKAN">DILIMPAHKAN</option>
            </x-splade-select>
            <x-splade-select class="col-span-full sm:col-span-2" name="terima" :label="__('Terima')" choices>
                @foreach($datakota as $provinsi)
                    @foreach($provinsi['kota'] as $kota)
                        <option value="{{ $kota }}">{{ $kota }}</option>
                    @endforeach
                @endforeach
            </x-splade-select>
            <x-splade-input class="col-span-full sm:col-span-2" name="catatan" label="Catatan" type="text" />


            <x-splade-submit class="col-span-full sm:col-span-full" label="Simpan" />
        </x-splade-form>
    </div>
</x-splade-modal>

