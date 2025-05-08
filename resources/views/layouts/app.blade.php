<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- ✅ Tambahkan ini --}}
    
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>


<body class="">

    {{-- Sticky Navbar --}}
    <nav class="bg-red shadow-md sticky top-0 z-50 bg-gradient-to-tr from-lime-500 to-yellow-400">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            {{-- Logo / Title --}}
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">Admin Panel</a>

            {{-- Menu Navigasi --}}
            <div class="space-x-4">
                <a href="{{ route('admin.galleries.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-m font-medium text-gray-700">
                    Dokumentasi
                </a>
                <a href="{{ route('admin.posts.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-m font-medium text-gray-700">
                    Berita
                </a>
                <a href="{{ route('admin.pelayanans.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-m font-medium text-gray-700">
                    Layanan
                </a>
                <a href="{{ route('admin.profile.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-m font-medium text-gray-700">
                    Profile
                </a>
                <a href="{{ route('admin.sosmed.index') }}"
                class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-m font-medium text-gray-700">
                 Sosial Media
             </a>
             <a href="{{ route('admin.carousels.index') }}"
                class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-m font-medium text-gray-700">
                 Carousel
             </a>
            </div>
            <a href="{{ route('logout') }}"
               class="bg-black hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-full shadow">
                Logout
            </a>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>
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
</body>

</html>
