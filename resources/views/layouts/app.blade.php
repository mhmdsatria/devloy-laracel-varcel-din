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
    <nav class="bg-red shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            {{-- Logo / Title --}}
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">Admin Panel</a>

            {{-- Menu Navigasi --}}
            <div class="space-x-4">
                <a href="{{ route('admin.galleries.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-gray-700">
                    Dokumentasi
                </a>
                <a href="{{ route('admin.posts.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-gray-700">
                    Berita
                </a>
                <a href="{{ route('admin.pelayanans.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-gray-700">
                    Layanan
                </a>
                <a href="{{ route('admin.profile.index') }}"
                   class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-gray-700">
                    Profile
                </a>
                <a href="{{ route('admin.sosmed.index') }}"
                class="px-3 py-2 rounded hover:bg-grey-700 hover:text-black transition text-gray-700">
                 Sosial Media
             </a>
            </div>

            {{-- User Dropdown --}}
            <div class="dropdown dropdown-end relative">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="User Avatar"
                             src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content absolute right-0 mt-3 z-[9999] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a href="{{ route('profile') }}" class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>

</body>

</html>
