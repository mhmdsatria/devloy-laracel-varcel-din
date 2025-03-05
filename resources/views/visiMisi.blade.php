<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Visi Misi</title>
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
        
    </x-layout>
    <x-footer></x-footer>

</body>

</html>
