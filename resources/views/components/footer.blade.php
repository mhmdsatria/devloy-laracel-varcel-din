@props(['stat'])

<footer class="bg-gray-100">
    <div style="background: linear-gradient(to bottom, #FFD707, #03954A);"
        class="rounded-3xl text-gray-800 py-10 shadow-gray-700">

        <div class="w-full max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-10 px-6">
            {{-- Bagian Logo --}}
            <div class="flex gap-x-8 items-center">
                <div class="flex flex-col items-center w-32 text-center">
                    <a href="https://www.kemkes.go.id" target="_blank" class="flex flex-col items-center">
                        <img src="{{ asset('img/logo-kemenkes.png') }}" alt="Logo 1" class="h-16 md:h-20 mb-2">
                        <p class="text-xs md:text-sm text-gray-800 leading-tight hover:underline">
                            Kementerian Kesehatan<br>Republik Indonesia
                        </p>
                    </a>
                </div>
                <div class="flex flex-col items-center w-32 text-center">
                    <a href="https://sukabumikab.go.id" target="_blank" class="flex flex-col items-center">
                        <img src="{{ asset('img/Lambang_Kab_Sukabumi.svg') }}" alt="Logo 2" class="h-16 md:h-20 mb-2">
                        <p class="text-xs md:text-sm text-gray-800 leading-tight hover:underline">
                            Pemerintah Kabupaten<br>Sukabumi
                        </p>
                    </a>
                </div>
                <div class="flex flex-col items-center w-32 text-center">
                    <a href="https://dinkes.sukabumikab.go.id" target="_blank" class="flex flex-col items-center">
                        <img src="{{ asset('img/puskesmas-seeklogo-3.svg') }}" alt="Logo 3" class="h-16 md:h-20 mb-2">
                        <p class="text-xs md:text-sm text-gray-800 leading-tight hover:underline">
                            Dinas Kesehatan Kabupaten Sukabumi
                        </p>
                    </a>
                </div>
            </div>

            {{-- Bagian Statistik --}}
            @if (isset($stat))
                <div class="flex flex-row gap-8 text-black text-center">
                    {{-- Total Views --}}
                    <div class="min-w-[100px]">
                        <div class="text-3xl md:text-4xl font-bold">{{ $stat->total_views ?? 0 }}</div>
                        <div class="w-12 h-1 bg-black mx-auto my-2"></div>
                        <p class="text-sm md:text-base font-semibold">TOTAL</p>
                    </div>
                    {{-- Weekly Views --}}
                    <div class="min-w-[100px]">
                        <div class="text-3xl md:text-4xl font-bold">{{ $stat->weekly_views ?? 0 }}</div>
                        <div class="w-12 h-1 bg-black mx-auto my-2"></div>
                        <p class="text-sm md:text-base font-semibold">MINGGU INI</p>
                    </div>
                    {{-- Monthly Views --}}
                    <div class="min-w-[100px]">
                        <div class="text-3xl md:text-4xl font-bold">{{ $stat->monthly_views ?? 0 }}</div>
                        <div class="w-12 h-1 bg-black mx-auto my-2"></div>
                        <p class="text-sm md:text-base font-semibold">BULAN INI</p>
                    </div>
                </div>
            @endif
        </div>

    </div>
</footer>

{{-- Copyright --}}
<div class="bg-gray-100 text-gray-600 text-center py-4 text-xs md:text-sm">
    <p class="mb-1">&copy; 2025 <span class="font-semibold">SAR Dev.</span></p>
    <p>
        Supported by
        <a href="https://diskominfosan.sukabumikab.go.id" target="_blank"
            class="text-blue-600 hover:underline font-medium">
            DKIP Kabupaten Sukabumi
        </a>
    </p>
</div>
