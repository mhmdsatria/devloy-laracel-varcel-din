<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Beranda</title>
</head>

<body>
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>
    <div class="bg-[#03954A] p-18 place-items-center text-white">
        <div class="text-center my-8">
            <h2 class="text-4xl font-bold">PROFILE KAMI</h2>
            <p></p>
        </div>
    </div>

    <x-layout>
        <!-- Variation 1: Grid Layout with Icons -->
        <div class="p-10 rounded-lg">
            <div class="grid grid-cols-2 gap-4 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800">VISI</h2>
                    <hr class="w-16 border-gray-500 my-2">
                    <p class="text-gray-800 text-xl font-semibold">" upaya untuk meningkatkan kualitas pelayanan kesehatan, mendorong kemandirian masyarakat, dan meningkatkan peran serta masyarakat dalam upaya kesehatan "</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('img/Stk.png') }}" alt="Visi" class="w-32 mx-auto">
                </div>
            </div>
            <div class="mt-8">
                <h2 class="text-4xl font-bold text-gray-800">MISI</h2>
                <hr class="w-16 border-gray-500 my-2">
                <ul class="list-decimal list-inside space-y-2 text-lg">
                    <li>Memberikan pelayanan kesehatan yang bermutu, adil, dan merata.</li>
                    <li>Meningkatkan kemampuan dan kualitas sumber daya tenaga kesehatan.</li>
                    <li>Meningkatkan tata kelola Puskesmas yang baik, efektif, dan efisien.</li>
                    <li>Mendorong kemandirian masyarakat untuk hidup sehat.</li>
                    <li>Meningkatkan peran serta masyarakat dalam upaya kesehatan baik promotif, preventif, dan kuratif.</li>
                    <li>Mengembangkan kerja sama dengan unsur-unsur terkait di bidang kesehatan.</li>
                </ul>
            </div>
        </div>     
        <div>
            <div class="bg-grey shadow-lg p-6 ">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 uppercase">Struktur Organisasi</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="p-6 text-justify">
                    <img src="{{ asset('img/Stk.png') }}" alt="" sizes="mt-12" srcset="">
                </div>
            </div>
        </div>
    </x-layout>
    
    <x-layout></x-layout>
    <x-layout></x-layout>
    <x-footer></x-footer>

</body>

</html>
