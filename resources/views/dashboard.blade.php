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
                            <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
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
                                {{ number_format($datapemilik ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
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
                                {{ number_format($dataakta ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4">
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
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
                                {{ number_format($datapemilik ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
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
                                {{ number_format($dataakta ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md p-6 border col-span-full sm:col-span-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                                Data Limpahkan
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400">
                                Keterangan Versil
                            </p>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="px-3 py-2 mb-3 mr-3 text-5xl font-bold text-center text-gray-900">
                                {{ number_format($dataakta ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
