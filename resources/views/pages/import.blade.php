<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center mb-8">
                        <a href="{{ url('/') }}/assets/contoh-data-import-bpka.xlsx" class="border border-indigo-500 hover:bg-indigo-600 font-bold py-2.5 px-4 rounded-md mr-2">
                            Download Contoh Data
                        </a>
                    </div>
                    <x-splade-form action="{{ route('dashboard.import.store') }}" method="POST" enctype="multipart/form-data"  confirm>
                        @csrf
                        <div class="">
                            <div class="max-w-xl mx-auto space-6">
                            <x-splade-file name="file" class="block" :label="__('Upload FIle Excel')" filepond preview />
                                <x-splade-submit class="mt-4" label="Upload" :spinner="true" />
                            </div>
                        </div>

                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
