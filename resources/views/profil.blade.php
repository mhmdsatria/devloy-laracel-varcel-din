<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Profil Kami</title>
</head>

<body>
    <x-header />
    <x-navbar />
    <div class="bg-[#03954A] place-items-center text-white">
        <div class="bg-[#03954A] p-12 text-white">
            <div class="text-center my-8">
                <h2 class="text-4xl font-bold">PROFIL KAMI</h2>
                <nav class="text-sm text-gray-200 mt-4" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex justify-center items-center space-x-1 sm:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="hover:underline hover:text-white">Home</a>
                            <span class="mx-2 text-gray-300">›</span>
                        </li>
                        <li class="inline-flex items-center">
                            <a href="/profil" class="hover:underline hover:text-white">Profil</a>
                        </li>
                        <li class="inline-flex items-center text-white font-medium">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Hero Section -->
    {{--  <div class="bg-[#03954A] p-16 text-white text-center">
        <h2 class="text-4xl font-bold">PROFIL KAMI</h2>
    </div>  --}}

    <!-- Visi & Misi -->
    <x-layout>
        <div class="p-10 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Visi -->
                <div>
                    <h2 class="text-4xl font-bold text-gray-800">VISI</h2>
                    <hr class="w-16 border-gray-500 my-2">
                    <p class="text-gray-800 text-xl font-semibold">
                        "Upaya untuk meningkatkan kualitas pelayanan kesehatan, mendorong kemandirian masyarakat, dan
                        meningkatkan peran serta masyarakat dalam upaya kesehatan."
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="mt-12">
                <h2 class="text-4xl font-bold text-gray-800">MISI</h2>
                <hr class="w-16 border-gray-500 my-2">
                <ul class="list-decimal list-inside space-y-2 text-lg text-gray-700">
                    <li>Memberikan pelayanan kesehatan yang bermutu, adil, dan merata.</li>
                    <li>Meningkatkan kemampuan dan kualitas sumber daya tenaga kesehatan.</li>
                    <li>Meningkatkan tata kelola Puskesmas yang baik, efektif, dan efisien.</li>
                    <li>Mendorong kemandirian masyarakat untuk hidup sehat.</li>
                    <li>Meningkatkan peran serta masyarakat dalam upaya kesehatan baik promotif, preventif, dan kuratif.
                    </li>
                    <li>Mengembangkan kerja sama dengan unsur-unsur terkait di bidang kesehatan.</li>
                </ul>
            </div>
        </div>
        <!-- Struktur Organisasi -->
        <section class="my-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-800 uppercase mb-2">Struktur Organisasi</h2>
                <hr class="w-24 mx-auto border-gray-400 mb-6">
            </div>

            <div class="flex justify-center">
                @if ($profile && $profile->struktur_organisasi)
                    <img src="{{ asset('storage/' . $profile->struktur_organisasi) }}" alt="Struktur Organisasi"
                        class="w-full max-w-3xl rounded shadow-lg">
                @else
                    <p class="text-gray-500 text-center">Struktur organisasi belum tersedia.</p>
                @endif
            </div>
        </section>
    </x-layout>

    <x-footer />
</body>

</html>
