<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-blue-600 p-4 text-white shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <a class="text-lg font-semibold" href="#">Admin Panel</a>
                <div class="space-x-4">
                    <a href="{{ route('admin.galleries.index') }}" class="px-3 py-2 hover:bg-blue-700 rounded transition">Dokumentasi</a>
                    <a href="{{ route('admin.posts.index') }}" class="px-3 py-2 hover:bg-blue-700 rounded transition">Berita</a>
                    <a href="{{ route('admin.pelayanans.index') }}">Layanan</a>
                </div>
                <a href="#" class="px-4 py-2 bg-red-500 rounded hover:bg-red-600 transition">Logout</a>
            </div>
        </nav>
        <main class="flex-grow container mx-auto p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
