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
    {{--  <x-layout>
        <div class="container mx-auto p-8">
            <h1 class="text-2xl font-bold mb-6">Gallery</h1>
            
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($galleries as $gallery)
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold">{{ $gallery->title }}</h3>
                            <a href="{{ route('gallery.show', $gallery->id) }}" class="text-indigo-600 hover:underline">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-layout>
      --}}
    <x-header></x-header>
    <x-navbar>puskesmas</x-navbar>
    <div x-data="{ activeIndex: 0, slides: 3 }" x-init="setInterval(() => activeIndex = (activeIndex + 1) % slides, 4000)" class="relative w-full">

        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-120">
            <!-- Overlay Gradasi -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>

            <!-- Item 1 -->
            <div x-show="activeIndex === 0" x-transition:enter="transition-opacity duration-800 ease-out"
                x-transition:leave="transition-opacity duration-800 ease-in" class="absolute w-full">
                <img src="{{ asset('img/landing-1.jpeg') }}" class="block w-full h-full object-cover" alt="Slide 1">
            </div>

            <!-- Item 2 -->
            <div x-show="activeIndex === 1" x-transition:enter="transition-opacity duration-800 ease-out"
                x-transition:leave="transition-opacity duration-800 ease-in" class="absolute w-full">
                <img src="{{ asset('img/landing-2.jpeg') }}" class="block w-full h-full object-cover" alt="Slide 2">
            </div>

            <!-- Item 3 -->
            <div x-show="activeIndex === 2" x-transition:enter="transition-opacity duration-800 ease-out"
                x-transition:leave="transition-opacity duration-800 ease-in" class="absolute w-full">
                <img src="{{ asset('img/landing-3.jpeg') }}" class="block w-full h-full object-cover" alt="Slide 3">
            </div>
        </div>
    </div>
    @include('content.partner')
    {{--  layanan kami  --}}
    <x-layout>
        <p class="text-center text-lg font-medium text-gray-700 leading-relaxed">
            Sesuai visi kami yaitu "mengembangkan sistem informasi kesehatan yang inovatif dan berkelanjutan", maka kami
            berinovasi untuk membuat sistem informasi guna untuk memudahkan pengguna, baik untuk internal maupun
            masyarakat.
        </p>
        <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
            <div class="mb-5 flex justify-center text-sm">
                <div class="text-center my-8">
                    <h2 class="text-4xl font-bold text-gray-800">LAYANAN KAMI</h2>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pelayanans as $pelayanan)
                    <x-card title="{{ $pelayanan->title }}" link="{{ url('/layanan/' . $pelayanan->id) }}"
                        description="{{ $pelayanan->description }}">
                    </x-card>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="/layanan" :active="request()->is('layanan')" class="inline-block px-6 py-3 mt-4 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-lg transition duration-300 ease-in-out">
                    Lihat Semua Layanan
                </a>
            </div>
        </div>
    </x-layout>
    {{--  pengunjung  --}}
    <div class="bg-[#03954A] p-18 place-items-center text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-15 text-center ">

            <!-- Jumlah Kunjungan Website -->
            <div>
                <div class="text-5xl font-bold">{{ $stat->total_views }}</div>
                <div class="w-16 h-1 bg-white mx-auto my-2"></div>
                <p class="text-lg">JUMLAH KUNJUNGAN WEBSITE</p>
            </div>

            <!-- Jadwal Kalender Kesehatan -->
            <div>
                <div class="text-5xl font-bold">136</div>
                <div class="w-16 h-1 bg-white mx-auto my-2"></div>
                <p class="text-lg">JADWAL KALENDER KESEHATAN 2024</p>
            </div>

            <!-- Jumlah Layanan Aktif -->
            <div>
                <div class="text-5xl font-bold">{{ $stat->active_services }}</div>
                <div class="w-16 h-1 bg-white mx-auto my-2"></div>
                <p class="text-lg">JUMLAH LAYANAN AKTIF</p>
            </div>

        </div>
    </div>
    {{--  Berita  --}}
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
                            <img class="w-full h-48 object-cover"
                            src="{{ asset('storage/' . $post->image) }}"
                                 alt="{{ $post->title }}">
                            <div class="p-5">
                                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                                <p class="font-base text-gray-500">{{ $post->author }} |
                                    {{ $post->created_at->format('d M Y') }}</p>
                                <p class="text-gray-600 mt-2">
                                    {{ \Illuminate\Support\Str::limit($post->content, 100, '...') }}</p>
                                <p class="text-gray-600 mt-2">{{ Str::words($post['body'], 15, '...') }}</p>
                                <a href="/informasi/{{ $post->slug }}"
                                   class="inline-block mt-4 text-indigo-600 hover:underline">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="/berita" :active="request()->is('berita')" class="inline-block px-6 py-3 mt-4 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-lg transition duration-300 ease-in-out">
                        Lihat Semua Berita
                    </a>
                </div>
            </div>
        </x-layout>
    </div>
    
    {{--  Data  --}}
    <x-layout>    
        <div x-data="statistikData()">
            <!-- Bagian Header -->
            <div class="header flex flex-col items-center justify-center gap-4 mb-6">
                <div class="text-center my-8">
                    <h2 class="text-4xl font-bold text-gray-800">STATISTIK KUNJUNGAN PASIEN</h2>
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

            <!-- Wrapper untuk Grafik -->
            <div class="chart-wrapper">
                <!-- Diagram Donat (Pie Chart) -->
                <div class="chart-container">
                    <h3>Kunjungan Pasien</h3>
                    <canvas id="kunjunganChart"></canvas>
                </div>

                <!-- Diagram Batang (Bar Chart) -->
                <div class="chart-container">
                    <h3>10 Penyakit Terbesar</h3>
                    <canvas id="penyakitChart"></canvas>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let items = document.querySelectorAll("[data-carousel-item]");
                let currentIndex = 0;

                function showSlide(index) {
                    items.forEach((item, i) => {
                        item.classList.remove("active");
                        item.style.opacity = "0";
                        item.style.visibility = "hidden";
                        item.style.display = "none"; // Sembunyikan semua

                        if (i === index) {
                            item.classList.add("active");
                            item.style.opacity = "1";
                            item.style.visibility = "visible";
                            item.style.display = "block"; // Tampilkan yang aktif
                        }
                    });
                }

                let nextBtn = document.querySelector("[data-carousel-next]");
                let prevBtn = document.querySelector("[data-carousel-prev]");

                if (nextBtn) {
                    nextBtn.addEventListener("click", function() {
                        currentIndex = (currentIndex + 1) % items.length;
                        showSlide(currentIndex);
                    });
                }

                if (prevBtn) {
                    prevBtn.addEventListener("click", function() {
                        currentIndex = (currentIndex - 1 + items.length) % items.length;
                        showSlide(currentIndex);
                    });
                }

                // Tampilkan slide pertama saat halaman dimuat
                showSlide(currentIndex);
            });

            function statistikData() {
                return {
                    selectedPeriod: 'Harian',
                    kunjunganChart: null,
                    penyakitChart: null,

                    // Data Kunjungan Pasien (Periode Berbeda)
                    kunjunganData: {
                        "Harian": [50, 30, 20, 15, 10], // Tunai, BPJS, SKTM, Asuransi, Gratis
                        "Mingguan": [300, 200, 150, 120, 80],
                        "Bulanan": [1200, 800, 600, 500, 400]
                    },

                    // Data Penyakit
                    penyakitData: {
                        labels: ["Flu", "Demam", "Batuk", "Asma", "TBC", "Hipertensi", "Diabetes", "COVID-19", "Diare", "Maag"],
                        values: [500, 450, 400, 380, 350, 320, 300, 290, 280, 270]
                    },

                    init() {
                        // Buat Pie Chart untuk Kunjungan Pasien
                        // Buat Pie Chart untuk Kunjungan Pasien
                        let ctx1 = document.getElementById('kunjunganChart').getContext('2d');
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
                                maintainAspectRatio: false // Mencegah chart menjadi gepeng
                            }
                        });

                        // Buat Bar Chart untuk 10 Penyakit Terbesar
                        let ctx2 = document.getElementById('penyakitChart').getContext('2d');
                        this.penyakitChart = new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: this.penyakitData.labels,
                                datasets: [{
                                    label: 'Jumlah Pasien',
                                    data: this.penyakitData.values,
                                    backgroundColor: "#3b82f6"
                                }]
                            }
                        });
                    },

                    updateChart() {
                        // Perbarui data Pie Chart
                        this.kunjunganChart.data.datasets[0].data = this.kunjunganData[this.selectedPeriod];
                        this.kunjunganChart.update();
                    }
                };
            }
        </script>
    </x-layout>
    {{--  footer  --}}
    <x-footer></x-footer>
</body>

</html>
