<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        [data-carousel-item] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            display: none;
            transition: opacity 0.7s ease-in-out;
        }

        [data-carousel-item].active {
            opacity: 1;
            visibility: visible;
            display: block;
        }

        /* Untuk bagian dropdown agar ada di tengah */
        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Grid untuk menyusun grafik berdampingan */
        .chart-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        /* Ukuran grafik agar seimbang */
        .chart-container {
            width: 45%;
            max-width: 500px;
            height: 400px;
            /* Pastikan tinggi cukup */
        }


        /* Menyesuaikan ukuran canvas */
        canvas {
            width: 100% !important;
            height: 300px !important;
        }
    </style>
    <title>Beranda</title>
</head>

<body>
    <x-header></x-header>
    <x-navbar >puskesmas</x-navbar>
    
    <div x-data="{ 
        activeIndex: 0, 
        slides: {{ $carouselImages->count() }},
        images: @json($carouselImages->map(fn($img) => ['image_url' => asset('storage/' . $img->image)]))
    }"
    x-init="setInterval(() => activeIndex = (activeIndex + 1) % slides, 4000)"
    class="relative w-full"
>
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-120">
        <!-- Overlay Gradasi -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>

        <!-- Slides -->
        <template x-for="(image, index) in images" :key="index">
            <div class="absolute w-full h-full transition-all duration-1000 ease-in-out"
                x-bind:class="{
                    'opacity-100 z-20': activeIndex === index,
                    'opacity-0 z-10': activeIndex !== index
                }">
                <img :src="image.image_url"
                     class="block w-full h-full object-cover"
                     :alt="`Slide ${index + 1}`">
            </div>
        </template>
    </div>
</div>

    <div class="bg-gray-100">
        <x-layout>
            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
                <div class="mb-5 flex justify-center text-sm">
                    <div class="text-center my-8">
                        <h2 class="text-4xl font-bold text-gray-800">LAYANAN KAMI</h2>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($pelayanans as $pelayanan)
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                            @if ($pelayanan->image)
                                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $pelayanan->image) }}"
                                    alt="{{ $pelayanan->title }}">
                            @endif
                            <div class="p-5">
                                <h2 class="text-xl font-semibold">{{ $pelayanan->title }}</h2>
                                <p class="text-gray-600 mt-2">
                                    {{ function_exists('mb_strimwidth')
                                        ? \Illuminate\Support\Str::limit($pelayanan->description, 100, '...')
                                        : \Illuminate\Support\Str::substr($pelayanan->description, 0, 100) . '...' }}
                                </p>
                                <a href="{{ url('/layanan/' . $pelayanan->id) }}"
                                    class="inline-block mt-4 text-blue-600 hover:underline">
                                    Lihat Detail
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-8">
                    <a href="/layanan"
                        class="inline-block px-6 py-3 mt-4 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg transition duration-300 ease-in-out">
                        Lihat Semua Layanan
                    </a>
                </div>
            </div>
        </x-layout>
    </div>


    <x-layout>
        <div class="max-w-6xl mx-auto px-4 py-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                {{-- Kolom Teks --}}
                <div class="md:w-1/2 text-center md:text-left">
                    <h1 class="text-4xl font-bold mb-4 text-gray-800">Pendaftaran Online</h1>
                    <p class="text-lg text-gray-800">
                        Sekarang pendaftaran untuk layanan kesehatan bisa dilakukan secara online dengan mudah dan
                        cepat.
                        Silahkan mengunduh dan membuat akun untuk salah satu aplikasi ini.
                    </p>
                </div>

                {{-- Kolom Logo --}}
                <div class="md:w-1/2 flex justify-center md:justify-end gap-x-10 mt-6 md:mt-0">
                    <img src="{{ asset('img/puskesmas-seeklogo-3.svg') }}" alt="Logo 1" class="h-16 md:h-20">
                    <img src="{{ asset('img/puskesmas-seeklogo-3.svg') }}" alt="Logo 2" class="h-16 md:h-20">
                    <img src="{{ asset('img/puskesmas-seeklogo-3.svg') }}" alt="Logo 3" class="h-16 md:h-20">
                </div>

            </div>
        </div>
    </x-layout>
    <div class="bg-gray-100">
        <x-layout class="">
            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
                <div class="mb-5 flex justify-center text-sm">
                    <div class="text-center my-8">
                        <h2 class="text-4xl font-bold text-gray-800">BERITA TERKINI</h2>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($beranda as $post)
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}"
                                alt="{{ $post->title }}">
                            <div class="p-5">
                                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                                <p class="font-base text-gray-500">{{ $post->author }} |
                                    {{ $post->created_at->format('d M Y') }}</p>
                                <p class="text-gray-600 mt-2">
                                    {{ \Illuminate\Support\Str::limit($post->content, 100, '...') }}</p>
                                <p class="text-gray-600 mt-2">{{ Str::words($post['body'], 15, '...') }}</p>
                                <a href="/informasi/{{ $post->slug }}"
                                    class="inline-block mt-4 text-blue-600 hover:underline">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="/berita" :active="request() - > is('berita')"
                        class="inline-block px-6 py-3 mt-4 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg transition duration-300 ease-in-out">
                        Lihat Semua Berita
                    </a>
                </div>
            </div>
        </x-layout>
    </div>

    <x-layout>
        <div x-data="statistikData()" x-init="init()">
            <!-- Bagian Header -->
            <div class="header flex flex-col items-center justify-center gap-4 mb-6">
                <div class="text-center my-8">
                    <h2 class="text-4xl font-bold text-gray-800">STATISTIK KUNJUNGAN</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="flex items-center gap-2">
                    <label class="font-semibold">Pilih Periode:</label>
                    <select x-model="selectedPeriod" @change="updateChart()" class="p-2 border rounded">
                        <option value="Harian">Harian</option>
                        <option value="Mingguan">Mingguan</option>
                        <option value="Bulanan">Bulanan</option>
                    </select>
                </div>
            </div>

            <!-- Wrapper untuk Grafik Pie -->
            <div class="chart-wrapper flex flex-wrap justify-center gap-10">
                <!-- Diagram Donat - Cara Bayar -->
                <div class="chart-container w-full max-w-md">
                    <h3 class="text-center font-semibold mb-2">Cara Bayar</h3>
                    <canvas id="kunjunganChart"></canvas>
                </div>

                <!-- Diagram Donat - Jenis Kelamin -->
                <div class="chart-container w-full max-w-md">
                    <h3 class="text-center font-semibold mb-2">Jenis Kelamin</h3>
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <!-- Grafik Batang Penyakit di Tengah -->
            <div class="flex justify-center mt-10">
                <div class="chart-container w-full max-w-4xl">
                    <h3 class="text-center font-semibold mb-4">10 Penyakit Terbesar</h3>
                    <canvas id="penyakitChart"></canvas>
                </div>
            </div>
        </div>

        <script>
            function statistikData() {
                return {
                    selectedPeriod: 'Harian',
                    kunjunganChart: null,
                    genderChart: null,
                    penyakitChart: null,

                    kunjunganData: {
                        "Harian": [50, 30, 20, 15, 10], // Tunai, BPJS, SKTM, Asuransi, Gratis
                        "Mingguan": [300, 200, 150, 120, 80],
                        "Bulanan": [1200, 800, 600, 500, 400]
                    },

                    genderData: {
                        labels: ["Laki-laki", "Perempuan"],
                        values: [60, 40]
                    },

                    penyakitData: {
                        labels: ["Flu", "Demam", "Batuk", "Asma", "TBC", "Hipertensi", "Diabetes", "COVID-19", "Diare", "Maag"],
                        values: [500, 450, 400, 380, 350, 320, 300, 290, 280, 270]
                    },

                    init() {
                        // Pie Chart Cara Bayar
                        const ctx1 = document.getElementById('kunjunganChart').getContext('2d');
                        this.kunjunganChart = new Chart(ctx1, {
                            type: 'doughnut',
                            data: {
                                labels: ["Tunai", "BPJS", "SKTM", "Asuransi", "Gratis"],
                                datasets: [{
                                    data: this.kunjunganData[this.selectedPeriod],
                                    backgroundColor: ["#4CAF50", "#FF9800", "#2196F3", "#9C27B0", "#F44336"]
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });

                        // Pie Chart Jenis Kelamin
                        const ctx2 = document.getElementById('genderChart').getContext('2d');
                        this.genderChart = new Chart(ctx2, {
                            type: 'doughnut',
                            data: {
                                labels: this.genderData.labels,
                                datasets: [{
                                    data: this.genderData.values,
                                    backgroundColor: ["#1E90FF", "#FF69B4"]
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });

                        // Bar Chart Penyakit
                        const ctx3 = document.getElementById('penyakitChart').getContext('2d');
                        this.penyakitChart = new Chart(ctx3, {
                            type: 'bar',
                            data: {
                                labels: this.penyakitData.labels,
                                datasets: [{
                                    label: 'Jumlah Pasien',
                                    data: this.penyakitData.values,
                                    backgroundColor: "#3b82f6"
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    },

                    updateChart() {
                        this.kunjunganChart.data.datasets[0].data = this.kunjunganData[this.selectedPeriod];
                        this.kunjunganChart.update();
                    }
                };
            }
        </script>
    </x-layout>

    <x-footer></x-footer>
</body>

</html>
