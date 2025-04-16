<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Detail Pelayanan</title>
</head>

<body>
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>

    <x-layout>

        <h1 class="text-2xl sm:pl-16 mt-5 font-bold ">Detail Layanan</h1>
        <div class="max-w-screen-xl mx-auto mt-4 mb-5 sm:pl-16">
            <div class="bg-white border rounded-lg shadow-sm p-6">
                <h1 class="text-3xl font-bold text-center">{{ $pelayanan->title }}</h1>
                <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                <p class="text-lg"><strong>Hari Layanan:</strong> {{ $pelayanan->days }}</p>
                <p class="text-gray-700 mt-2">{{ $pelayanan->description }}</p>
            </div>


            <div class="mt-4 space-y-4">
                @foreach ($details as $detail)
                    <div class="p-4 bg-white border rounded-lg shadow-sm">
                        <h3 class="text-xl font-semibold">Hari: {{ $detail->days }}</h3>
                        <p class="text-gray-600">{{ $detail->detail }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                <a href="{{ url('/layanan') }}" class="text-blue-600 hover:underline">&laquo; Kembali ke Daftar Pelayanan</a>
            </div>
        </div>
    </x-layout>

    <x-footer></x-footer>
</body>

</html>
