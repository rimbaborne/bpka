<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Akta Tanah') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <x-splade-table :for="$data" /> --}}

                    <div class="">
                        <!-- Form Pencarian -->
                        <div class="mt-6 ">
                            <form action="#" method="GET" class="mb-4 ">
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                    <div>
                                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pemilik</label>
                                        <input
                                            type="text"
                                            name="nama"
                                            id="nama"
                                            value="{{ request()->nama }}"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        />
                                    </div>
                                    <div>
                                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                        <input
                                            type="text"
                                            name="alamat"
                                            id="alamat"
                                            value="{{ request()->alamat }}"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        />
                                    </div>
                                    <div>
                                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                                        <input
                                            type="text"
                                            name="nik"
                                            id="nik"
                                            value="{{ request()->nik }}"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        />
                                    </div>
                                    <div>
                                        <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                        <input
                                            type="text"
                                            name="nomor_telepon"
                                            id="nomor_telepon"
                                            value="{{ request()->nomor_telepon }}"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        />
                                    </div>
                                    <div>
                                        <label for="nomor_notaris" class="block text-sm font-medium text-gray-700">Nomor Notaris</label>
                                        <input
                                            type="text"
                                            name="nomor_notaris"
                                            id="nomor_notaris"
                                            value="{{ request()->nomor_notaris }}"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        />
                                    </div>
                                    <div>
                                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                                        <select
                                            name="keterangan"
                                            id="keterangan"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        >
                                            <option value="">-- Pilih Keterangan --</option>
                                            <option value="LIMPAHAN" {{ request()->keterangan == 'LIMPAHAN' ? 'selected' : '' }}>LIMPAHAN</option>
                                            <option value="PEMILIK" {{ request()->keterangan == 'PEMILIK' ? 'selected' : '' }}>PEMILIK</option>
                                            <option value="DILIMPAHKAN" {{ request()->keterangan == 'DILIMPAHKAN' ? 'selected' : '' }}>DILIMPAHKAN</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="per_page" class="block text-sm font-medium text-gray-700">Data Per Halaman</label>
                                        <select
                                            name="per_page"
                                            id="per_page"
                                            class="mt-1 px-4 py-2 border border-gray-200 rounded-md w-full"
                                        >
                                            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                                            <option value="25" {{ request()->per_page == 25 ? 'selected' : '' }}>25</option>
                                            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="my-4 px-10 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 flex items-center justify-between">
                                    <span>Cari </span>
                                </button>
                            </form>
                            <form action="{{ route('dashboard.akta.export') }}" method="GET" class="my-4 flex items-right justify-end" onsubmit="return confirm('Konfirmasi permintaan export data')">
                                <input type="hidden" name="nama" value="{{ request('nama') }}">
                                <input type="hidden" name="alamat" value="{{ request('alamat') }}">
                                <input type="hidden" name="nik" value="{{ request('nik') }}">
                                <input type="hidden" name="nomor_telepon" value="{{ request('nomor_telepon') }}">
                                <input type="hidden" name="nomor_notaris" value="{{ request('nomor_notaris') }}">
                                <input type="hidden" name="keterangan" value="{{ request('keterangan') }}">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center justify-between">
                                    <span>Export Excel </span>
                                </button>
                            </form>
                        </div>


                        <!-- Tabel Data Lahan -->
                        <div class="shadow-sm relative border border-gray-200 sm:rounded-md overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 bg-white">
                                <thead class="bg-gray-50">
                                    <tr class="" style="white-space: nowrap;">
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                No
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Humas
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Nama
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Total Ha
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Surat
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Alamat
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                NIK
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Kontak
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Ibu Kandung
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Versil
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Tanggal
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Keterangan
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Terima
                                            </span>
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold tracking-wide text-gray-700">
                                            <span class="flex flex-row items-center justify-start uppercase">
                                                Catatan
                                            </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @php
                                        $currentPemilikId = null;
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $lahan)
                                        <tr class="hover:bg-gray-50" style="white-space: nowrap;">
                                            @if ($currentPemilikId !== $lahan->pemilik_id)
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $no++ }}</div></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer">
                                                    <div class="flex flex-row items-center justify-start">
                                                        <Link href="{{ route('dashboard.pemilik.show', ['id' => $lahan->pemilik_id]) }}"> {{ $lahan->pemilik->humas }} </Link>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer">
                                                    <div class="flex flex-row items-center justify-start">
                                                        <Link href="{{ route('dashboard.pemilik.show', ['id' => $lahan->pemilik_id]) }}"> {{ $lahan->pemilik->nama }} </Link>
                                                    </div>
                                                </td>
                                                @php
                                                    $totalLuasTanah = 0;
                                                @endphp
                                                @foreach($lahan->pemilik->lahan as $lahan)
                                                    @php
                                                        $totalLuasTanah += $lahan->luas_tanah;
                                                        $jumlahSurat += $lahan->jumlah;
                                                    @endphp
                                                @endforeach
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $totalLuasTanah }}</div></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $jumlahSurat }}</div></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->pemilik->alamat }}</div></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->pemilik->nik }}</div></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->pemilik->nomor_telepon }}</div></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->pemilik->ibu_kandung }}</div></td>
                                            @else
                                                <!-- Jika pemilik sama, kosongkan kolom pemilik -->
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                                <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"></td>
                                            @endif
                                            <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->nomor_notaris }}</div></td>
                                            <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->tanggal_notaris }}</div></td>
                                            <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->keterangan }}</div></td>
                                            <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->terima }}</div></td>
                                            <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer"><div class="flex flex-row items-center justify-start">{{ $lahan->catatan }}</div></td>
                                            <td class="whitespace-nowrap text-sm px-4 py-2 text-gray-500 cursor-pointer">
                                                <div class="flex flex-row items-center justify-start">
                                                    <Link modal href="{{ route('dashboard.akta.show', ['id' => $lahan->pemilik_id, 'notaris' => $lahan->id]) }}" class="text-indigo-500 hover:text-indigo-700 border border-indigo-500 py-1 px-4 rounded-md">Edit </Link>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $currentPemilikId = $lahan->pemilik_id;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $data->appends(request()->query())->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
