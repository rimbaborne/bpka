<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pemilik Akta') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end mb-4">
                        <Link modal href="{{ route('dashboard.pemilik.create') }}" class=" hover:text-indigo-700 text-white bg-indigo-500 hover:bg-white hover:border hover:border-indigo-500 py-2.5 px-4 my-1 rounded-md">
                            Tambah Data Pemilik Akta  <i class="ml-2 fas fa-plus-circle text-md">
                        </Link>
                    </div>
                    <x-splade-table :for="$data" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
