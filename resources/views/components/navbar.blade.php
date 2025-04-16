<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


<nav class="sticky top-0 z-50 bg-white shadow-lg shadow-gray-500/50 w-full overflow-hidden ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Nama Puskesmas di Sebelah Kiri -->
            <h1 class="text-gray-800 text-2xl font-bold">PUSKESMAS CISAAT</h1>

            <!-- Navigasi di Sebelah Kanan -->
            <div class="flex space-x-4">
                <x-nav-link href="/" :active="request()->is('beranda')">Beranda</x-nav-link>
                <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
                <x-nav-link href="/layanan" :active="request()->is('layanan')">Layanan</x-nav-link>
                <x-nav-link href="{{ route('gallery.index') }}" :active="request()->is('gallery*')">Dokumentasi</x-nav-link>
                <x-nav-link href="/berita" :active="request()->is('berita')">Berita</x-nav-link>
                <x-nav-link href="/pagelogin" :active="request()->is('pagelogin')">Kontak</x-nav-link>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownProfileButton");
        const dropdownMenu = document.getElementById("dropdownProfile");

        dropdownButton.addEventListener("click", function() {
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>
