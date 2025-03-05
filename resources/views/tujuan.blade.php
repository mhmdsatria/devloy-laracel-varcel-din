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

    <x-layout>
        <div class="p-6 bg-white shadow-lg rounded-lg mt-6">
            <h1 class="text-2xl font-bold text-center text-black-600 mb-6">Tujuan Puskesmas</h1>
            <ul class="space-y-4">
                <li class="p-4 border-l-4 border-blue-500 bg-blue-50 rounded">
                    <h2 class="text-xl font-semibold">Meningkatkan Kualitas Pelayanan Kesehatan</h2>
                    <p>Memberikan pelayanan kesehatan yang profesional, ramah, dan berbasis standar mutu untuk memenuhi kebutuhan masyarakat.</p>
                </li>
                <li class="p-4 border-l-4 border-green-500 bg-green-50 rounded">
                    <h2 class="text-xl font-semibold">Mempermudah Akses Layanan Kesehatan</h2>
                    <p>Menyediakan layanan kesehatan yang mudah dijangkau oleh seluruh lapisan masyarakat, termasuk kelompok rentan dan daerah terpencil.</p>
                </li>
                <li class="p-4 border-l-4 border-yellow-500 bg-yellow-50 rounded">
                    <h2 class="text-xl font-semibold">Mendorong Peran Aktif Masyarakat</h2>
                    <p>Melibatkan masyarakat dalam upaya kesehatan melalui edukasi, penyuluhan, dan program pencegahan penyakit.</p>
                </li>
                <li class="p-4 border-l-4 border-red-500 bg-red-50 rounded">
                    <h2 class="text-xl font-semibold">Meningkatkan Efektivitas dan Efisiensi Manajemen</h2>
                    <p>Mengoptimalkan sumber daya, fasilitas, dan sistem administrasi untuk pelayanan yang transparan dan akuntabel.</p>
                </li>
                <li class="p-4 border-l-4 border-purple-500 bg-purple-50 rounded">
                    <h2 class="text-xl font-semibold">Mewujudkan Lingkungan yang Sehat dan Berkelanjutan</h2>
                    <p>Mengimplementasikan program kesehatan lingkungan serta bekerja sama dengan berbagai pihak untuk menciptakan lingkungan yang sehat.</p>
                </li>
            </ul>
        </div>
    </x-layout>
    <x-footer></x-footer>

</body>

</html>
