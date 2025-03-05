<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


<nav class="bg-white shadow-lg shadow-gray-500/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-center">
            <div class="flex space-x-4 relative">
                <x-nav-link href="/beranda" :active="request()->is('beranda')">Beranda</x-nav-link>
                <!-- Dropdown Profile -->
                <div class="relative">
                    <button id="dropdownProfileButton" data-dropdown-toggle="dropdownProfile"
                        class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white 
        {{ request()->is('visi-misi') || request()->is('tujuan') || request()->is('motto') || request()->is('struktur-organisasi') ? 'bg-gray-900 text-white' : '' }}">
                        Profile
                        <svg class="w-2.5 h-2.5 ml-2 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownProfile"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
                            <li>
                                <x-nav-link href="/visi-misi">Visi Misi</x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="/tujuan">Tujuan</x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="/motto">Motto</x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="/struktur-organisasi">Struktur
                                    Organisasi</x-nav-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <x-nav-link href="/pelayanan" :active="request()->is('pelayanan')">Pelayanan</x-nav-link>
                <x-nav-link href="/informasi" :active="request()->is('informasi')">Informasi</x-nav-link>
                <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>
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
