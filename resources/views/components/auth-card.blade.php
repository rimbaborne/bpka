<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{-- @isset($logo)
            {{ $logo }}
        @else
            <Link href="/">
                <x-application-logo class="w-10 fill-current text-gray-500" />
            </Link>
        @endisset --}}
        <img src="{{ url('/') }}/assets/logo-bpka.png" class="w-64" alt="">

    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
