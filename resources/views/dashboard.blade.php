<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-5 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                                Pemilik Akta
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400">
                                Banyak Data
                            </p>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="px-3 py-2 mb-3 mr-3 text-5xl font-bold text-center text-gray-900">
                                {{ number_format($data['pemilik'] ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                                Akta Notaris
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400">
                                Versil
                            </p>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="px-3 py-2 mb-3 mr-3 text-5xl font-bold text-center text-gray-900">
                                {{ number_format($data['akta']  ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4">
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                                Data Akta Pemilik
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400">
                                Keterangan Versil
                            </p>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="px-3 py-2 mb-3 mr-3 text-5xl font-bold text-center text-gray-900">
                                {{ number_format($data['akta-pemilik'] ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                                Data Dilimpahkan
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400">
                                Keterangan Versil
                            </p>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="px-3 py-2 mb-3 mr-3 text-5xl font-bold text-center text-gray-900">
                                {{ number_format($data['akta-dilimpahkan'] ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                                Data Limpahan
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400">
                                Keterangan Versil
                            </p>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="px-3 py-2 mb-3 mr-3 text-5xl font-bold text-center text-gray-900">
                                {{ number_format($data['akta-limpahan'] ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
