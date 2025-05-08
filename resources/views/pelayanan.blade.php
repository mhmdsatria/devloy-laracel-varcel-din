<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Layanan</title>
</head>

<body>
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>
    <div class="bg-[#03954A] place-items-center text-white">
        <div class="bg-[#03954A] p-12 text-white">
            <div class="text-center my-8">
                <h2 class="text-4xl font-bold">LAYANAN KAMI</h2>
                <nav class="text-sm text-gray-200 mt-4" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex justify-center items-center space-x-1 sm:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="hover:underline hover:text-white">Home</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="inline-flex items-center">
                            <a href="/layanan" class="hover:underline hover:text-white">Layanan</a>
                        </li>
                        <li class="inline-flex items-center text-white font-medium">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    {{--  <div class="bg-[#03954A] p-18 place-items-center text-white">
        <div class="text-center my-8">
            <h2 class="text-4xl font-bold">LAYANAN KAMI</h2>
            <p></p>
        </div>
    </div>  --}}
    <x-layout>
        <div class="max-w-screen-xl mx-auto sm:p-10 md:p-8">
            {{--  <div class="text-center my-6">
                <h2 class="text-4xl font-bold text-gray-800">LAYANAN KAMI</h2>
            </div>  --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($pelayanans as $pelayanan)
                    <x-card title="{{ $pelayanan->title }}" link="{{ url('/layanan/' . $pelayanan->id) }}"
                        description="{{ $pelayanan->description }}">
                    </x-card>
                @endforeach

            </div>
        </div>
    </x-layout>
    <x-footer :stat="$stat" />
</body>

</html>
