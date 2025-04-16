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
    <x-header></x-header>
    <x-navbar></x-navbar>
    <div class="bg-[#03954A] p-18 place-items-center text-white">
        <div class="text-center my-8">
            <h2 class="text-4xl font-bold">DOKUMENTASI KAMI</h2>
            <p></p>
        </div>
    </div>
    <x-layout>
        <main class="flex-grow container mx-auto p-6">
            @yield('content')
        </main>
    </x-layout>
    <x-footer></x-footer>
</body>
</html>
