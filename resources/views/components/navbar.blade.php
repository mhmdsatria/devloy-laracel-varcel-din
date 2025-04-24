<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

@php
    use Illuminate\Support\Facades\DB;

    $socialLinks = DB::table('social_links')->get();
    $profile = \App\Models\Profile::latest()->first();
@endphp


<nav class="sticky top-0 z-50 bg-white shadow-lg shadow-gray-500/50 w-full overflow-hidden">
    <!-- Bagian Atas: Nama Puskesmas & Email -->

    <!-- Bagian Ikon Sosial -->
    <div class="bg-white shadow-sm">
        <div class="flex justify-between items-center max-w-7xl mx-auto py-2">
            {{-- Email di sebelah kiri --}}
            <h1 class="text-gray-800 text-sm">
                Email CSO : {{ $profile->email ?? 'email@example.com' }}
            </h1>
            <div class="flex space-x-4 justify-end">
                @foreach ($socialLinks as $link)
                    @php
                        $iconMap = [
                            'facebook' => 'https://img.icons8.com/?size=100&id=118497&format=png&color=000000',
                            'instagram' => 'https://img.icons8.com/?size=100&id=Xy10Jcu1L2Su&format=png&color=000000',
                            'tiktok' => 'https://img.icons8.com/?size=100&id=118640&format=png&color=000000',
                        ];
                    @endphp
                    @if(isset($iconMap[$link->platform]))
                        <a href="{{ $link->url }}" target="_blank">
                            <img src="{{ $iconMap[$link->platform] }}"
                                 alt="{{ ucfirst($link->platform) }}"
                                 class="w-8 h-8">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    

    <!-- Navigasi Utama -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <h1 class="text-gray-800 text-2xl font-bold">
                {{ $profile->nama_puskesmas ?? 'Puskesmas Cisaat' }}
            </h1>
            <div class="flex space-x-4">
                <x-nav-link href="/" :active="request()->is('beranda')">Beranda</x-nav-link>
                <x-nav-link href="/profil" :active="request()->is('profil')">Profil</x-nav-link>
                <x-nav-link href="/layanan" :active="request()->is('layanan')">Layanan</x-nav-link>
                <x-nav-link href="{{ route('gallery.index') }}" :active="request()->is('gallery*')">Dokumentasi</x-nav-link>
                <x-nav-link href="/berita" :active="request()->is('berita')">Berita</x-nav-link>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownButton = document.getElementById("dropdownProfileButton");
        const dropdownMenu = document.getElementById("dropdownProfile");

        dropdownButton?.addEventListener("click", function () {
            dropdownMenu?.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButton?.contains(event.target) && !dropdownMenu?.contains(event.target)) {
                dropdownMenu?.classList.add("hidden");
            }
        });
    });
</script>
