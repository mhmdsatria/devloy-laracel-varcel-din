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
        <div class="mt-6">
            <div class="bg-grey shadow-lg p-6 ">
                <div class="text-center">
                    <h2 class="text-xl font-bold text-black-600 mb-4">Visi</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="p-6 text-justify">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt vel adipisci facere ex a, quaerat
                        doloremque tempore nemo labore atque, exercitationem, culpa natus necessitatibus laudantium quo
                        commodi soluta perspiciatis vero!</p>
                </div>
            </div>
            <div class="bg-grey shadow-lg mt-12">
                <div>
                    <h2 class="text-xl font-bold text-black-600 mb-4 text-center">Misi</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="p-6">
                    <ul class="list-disc pl-6 space-y-2 text-justify">
                        <li>Memberikan pelayanan kesehatan yang profesional, ramah, dan berbasis standar mutu.</li>
                        <li>Mengembangkan tenaga kesehatan yang kompeten dan berintegritas.</li>
                        <li>Menyediakan layanan kesehatan yang inklusif bagi seluruh lapisan masyarakat.</li>
                        <li>Memanfaatkan teknologi untuk meningkatkan akses dan efisiensi pelayanan.</li>
                        <li>Meningkatkan edukasi dan promosi kesehatan kepada masyarakat.</li>
                        <li>Mendorong pola hidup sehat melalui program preventif dan promotif.</li>
                        <li>Meningkatkan tata kelola dan administrasi yang transparan serta akuntabel.</li>
                        <li>Mengoptimalkan sumber daya dan fasilitas untuk pelayanan kesehatan yang prima.</li>
                        <li>Menerapkan kebijakan ramah lingkungan dalam pelayanan kesehatan.</li>
                        <li>Berkolaborasi dengan berbagai pihak dalam menciptakan lingkungan sehat.</li>
                    </ul>
                </div>
            </div>
        </div>
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
        <div class="mt-6">
            <div class="bg-grey shadow-lg p-6 ">
                <div class="text-center">
                    <h2 class="text-xl font-bold text-black-600 mb-4">Motto Kami</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="p-6 text-center">
                    <p>"Sehat Bersama, Layanan Prima, Masyarakat Sejahtera"</p>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-grey shadow-lg p-6 ">
                <div class="text-center">
                    <h2 class="text-xl font-bold text-black-600 mb-4">Struktur Organisasi</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="p-6 text-justify">
                    <img src="{{ asset('img/Stk.png') }}" alt="" sizes="mt-12" srcset="">
                </div>
            </div>
        </div>
    </x-layout>
    <x-footer></x-footer>

</body>

</html>
