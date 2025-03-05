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
    <x-navbar>puskesmas</x-navbar>
    {{--  <x-landing-page></x-landing-page>  --}}

    <x-layout>

        <div class="mb-12">
            <h1 class="text-3xl font-bold text-center">
                Layanan Kami
            </h1>
        </div>
        <div class="grid gap-14 md:grid-cols-3 md:gap-5">
            <div class="rounded-xl bg-white p-6 text-center shadow-xl">
                <div
                    class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full bg-teal-400 shadow-lg shadow-teal-500/40">
                    <svg viewBox="0 0 33 46" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-white">
                        <path
                            d="M24.75 23H8.25V28.75H24.75V23ZM32.3984 9.43359L23.9852 0.628906C23.5984 0.224609 23.0742 0 22.5242 0H22V11.5H33V10.952C33 10.3859 32.7852 9.83789 32.3984 9.43359ZM19.25 12.2188V0H2.0625C0.919531 0 0 0.961328 0 2.15625V43.8438C0 45.0387 0.919531 46 2.0625 46H30.9375C32.0805 46 33 45.0387 33 43.8438V14.375H21.3125C20.1781 14.375 19.25 13.4047 19.25 12.2188ZM5.5 6.46875C5.5 6.07164 5.80766 5.75 6.1875 5.75H13.0625C13.4423 5.75 13.75 6.07164 13.75 6.46875V7.90625C13.75 8.30336 13.4423 8.625 13.0625 8.625H6.1875C5.80766 8.625 5.5 8.30336 5.5 7.90625V6.46875ZM5.5 12.2188C5.5 11.8216 5.80766 11.5 6.1875 11.5H13.0625C13.4423 11.5 13.75 11.8216 13.75 12.2188V13.6562C13.75 14.0534 13.4423 14.375 13.0625 14.375H6.1875C5.80766 14.375 5.5 14.0534 5.5 13.6562V12.2188ZM27.5 39.5312C27.5 39.9284 27.1923 40.25 26.8125 40.25H19.9375C19.5577 40.25 19.25 39.9284 19.25 39.5312V38.0938C19.25 37.6966 19.5577 37.375 19.9375 37.375H26.8125C27.1923 37.375 27.5 37.6966 27.5 38.0938V39.5312ZM27.5 21.5625V30.1875C27.5 30.9817 26.8847 31.625 26.125 31.625H6.875C6.11531 31.625 5.5 30.9817 5.5 30.1875V21.5625C5.5 20.7683 6.11531 20.125 6.875 20.125H26.125C26.8847 20.125 27.5 20.7683 27.5 21.5625Z"
                            fill="white"></path>
                    </svg>
                </div>
                <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">TREE AND SHRUB PRUNING</h1>
                <p class="px-4 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo iure
                    inventore amet
                    modi
                    accusantium vero perspiciatis, incidunt dicta sed aspernatur!</p>
            </div>
            <div data-aos-delay="150" class="rounded-xl bg-white p-6 text-center shadow-xl">
                <div
                    class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-rose-500 shadow-rose-500/40"">
                    <svg viewBox=" 0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-white">
                        <path
                            d="M12 0C11.0532 0 10.2857 0.767511 10.2857 1.71432V5.14285H13.7142V1.71432C13.7142 0.767511 12.9467 0 12 0Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M36 0C35.0532 0 34.2856 0.767511 34.2856 1.71432V5.14285H37.7142V1.71432C37.7143 0.767511 36.9468 0 36 0Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M42.8571 5.14282H37.7143V12C37.7143 12.9468 36.9468 13.7143 36 13.7143C35.0532 13.7143 34.2857 12.9468 34.2857 12V5.14282H13.7142V12C13.7142 12.9468 12.9467 13.7143 11.9999 13.7143C11.0531 13.7143 10.2856 12.9468 10.2856 12V5.14282H5.14285C2.30253 5.14282 0 7.44535 0 10.2857V42.8571C0 45.6974 2.30253 48 5.14285 48H42.8571C45.6975 48 48 45.6974 48 42.8571V10.2857C48 7.44535 45.6975 5.14282 42.8571 5.14282ZM44.5714 42.8571C44.5714 43.8039 43.8039 44.5714 42.857 44.5714H5.14285C4.19605 44.5714 3.42854 43.8039 3.42854 42.8571V20.5714H44.5714V42.8571Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M13.7142 23.9999H10.2857C9.33889 23.9999 8.57138 24.7674 8.57138 25.7142C8.57138 26.661 9.33889 27.4285 10.2857 27.4285H13.7142C14.661 27.4285 15.4285 26.661 15.4285 25.7142C15.4285 24.7674 14.661 23.9999 13.7142 23.9999Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M25.7143 23.9999H22.2857C21.3389 23.9999 20.5714 24.7674 20.5714 25.7142C20.5714 26.661 21.3389 27.4285 22.2857 27.4285H25.7143C26.6611 27.4285 27.4286 26.661 27.4286 25.7142C27.4286 24.7674 26.6611 23.9999 25.7143 23.9999Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M37.7143 23.9999H34.2857C33.3389 23.9999 32.5714 24.7674 32.5714 25.7142C32.5714 26.661 33.3389 27.4285 34.2857 27.4285H37.7143C38.6611 27.4285 39.4286 26.661 39.4286 25.7142C39.4286 24.7674 38.661 23.9999 37.7143 23.9999Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M13.7142 30.8571H10.2857C9.33889 30.8571 8.57138 31.6246 8.57138 32.5714C8.57138 33.5182 9.33889 34.2857 10.2857 34.2857H13.7142C14.661 34.2857 15.4285 33.5182 15.4285 32.5714C15.4285 31.6246 14.661 30.8571 13.7142 30.8571Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M25.7143 30.8571H22.2857C21.3389 30.8571 20.5714 31.6246 20.5714 32.5714C20.5714 33.5182 21.3389 34.2857 22.2857 34.2857H25.7143C26.6611 34.2857 27.4286 33.5182 27.4286 32.5714C27.4286 31.6246 26.6611 30.8571 25.7143 30.8571Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M37.7143 30.8571H34.2857C33.3389 30.8571 32.5714 31.6246 32.5714 32.5714C32.5714 33.5182 33.3389 34.2857 34.2857 34.2857H37.7143C38.6611 34.2857 39.4286 33.5182 39.4286 32.5714C39.4285 31.6246 38.661 30.8571 37.7143 30.8571Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M13.7142 37.7142H10.2857C9.33889 37.7142 8.57138 38.4817 8.57138 39.4286C8.57138 40.3754 9.33889 41.1428 10.2857 41.1428H13.7142C14.661 41.1428 15.4285 40.3753 15.4285 39.4284C15.4285 38.4816 14.661 37.7142 13.7142 37.7142Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M25.7143 37.7142H22.2857C21.3389 37.7142 20.5714 38.4817 20.5714 39.4285C20.5714 40.3754 21.3389 41.1429 22.2857 41.1429H25.7143C26.6611 41.1429 27.4286 40.3754 27.4286 39.4285C27.4286 38.4817 26.6611 37.7142 25.7143 37.7142Z"
                            fill="#F5F5FC"></path>
                        <path
                            d="M37.7143 37.7142H34.2857C33.3389 37.7142 32.5714 38.4817 32.5714 39.4285C32.5714 40.3754 33.3389 41.1429 34.2857 41.1429H37.7143C38.6611 41.1429 39.4286 40.3754 39.4286 39.4285C39.4286 38.4817 38.661 37.7142 37.7143 37.7142Z"
                            fill="#F5F5FC"></path>
                    </svg>
                </div>
                <h1 class="text-darken mb-3 text-xl font-medium lg:px-14 ">IRRIGATION & DRAINAGE</h1>
                <p class="px-4 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo iure
                    inventore amet
                    modi
                    accusantium vero perspiciatis, incidunt dicta sed aspernatur!</p>
            </div>
            <div data-aos-delay="300" class="rounded-xl bg-white p-6 text-center shadow-xl">
                <div
                    class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-sky-500 shadow-sky-500/40">
                    <svg viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-white">
                        <path
                            d="M8.25 19.25C11.2836 19.25 13.75 16.7836 13.75 13.75C13.75 10.7164 11.2836 8.25 8.25 8.25C5.21641 8.25 2.75 10.7164 2.75 13.75C2.75 16.7836 5.21641 19.25 8.25 19.25ZM46.75 19.25C49.7836 19.25 52.25 16.7836 52.25 13.75C52.25 10.7164 49.7836 8.25 46.75 8.25C43.7164 8.25 41.25 10.7164 41.25 13.75C41.25 16.7836 43.7164 19.25 46.75 19.25ZM49.5 22H44C42.4875 22 41.1211 22.6102 40.1242 23.5984C43.5875 25.4977 46.0453 28.9266 46.5781 33H52.25C53.7711 33 55 31.7711 55 30.25V27.5C55 24.4664 52.5336 22 49.5 22ZM27.5 22C32.8195 22 37.125 17.6945 37.125 12.375C37.125 7.05547 32.8195 2.75 27.5 2.75C22.1805 2.75 17.875 7.05547 17.875 12.375C17.875 17.6945 22.1805 22 27.5 22ZM34.1 24.75H33.3867C31.5992 25.6094 29.6141 26.125 27.5 26.125C25.3859 26.125 23.4094 25.6094 21.6133 24.75H20.9C15.4344 24.75 11 29.1844 11 34.65V37.125C11 39.4023 12.8477 41.25 15.125 41.25H39.875C42.1523 41.25 44 39.4023 44 37.125V34.65C44 29.1844 39.5656 24.75 34.1 24.75ZM14.8758 23.5984C13.8789 22.6102 12.5125 22 11 22H5.5C2.46641 22 0 24.4664 0 27.5V30.25C0 31.7711 1.22891 33 2.75 33H8.41328C8.95469 28.9266 11.4125 25.4977 14.8758 23.5984Z"
                            fill="white"></path>
                    </svg>
                </div>
                <h1 class="text-darken mb-3 pt-3 text-xl font-medium lg:h-14 lg:px-14">GARDEN BED MAINTENANCE</h1>
                <p class="px-4 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo iure
                    inventore amet
                    modi
                    accusantium vero perspiciatis, incidunt dicta sed aspernatur!</p>
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">

            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
                <div class="mb-5 flex justify-center text-sm">
                    <div>
                        <h1 class="text-3xl font-bold text-center">
                            Berita Terkini
                        </h1>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover"
                            src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                            alt="Berita 1">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">Judul Artikel 1</h2>
                            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.</p>
                            <a href="#" class="inline-block mt-4 text-indigo-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover"
                            src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                            alt="Berita 2">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">Judul Artikel 2</h2>
                            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.</p>
                            <a href="#" class="inline-block mt-4 text-indigo-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover"
                            src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                            alt="Berita 3">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">Judul Artikel 3</h2>
                            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.</p>
                            <a href="#" class="inline-block mt-4 text-indigo-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover"
                            src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                            alt="Berita 3">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">Judul Artikel 4</h2>
                            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.</p>
                            <a href="#" class="inline-block mt-4 text-indigo-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover"
                            src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                            alt="Berita 3">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">Judul Artikel 5</h2>
                            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.</p>
                            <a href="#" class="inline-block mt-4 text-indigo-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover"
                            src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                            alt="Berita 3">
                        <div class="p-5">
                            <h2 class="text-xl font-semibold">Judul Artikel 6</h2>
                            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.</p>
                            <a href="#" class="inline-block mt-4 text-indigo-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="py-12 ">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Contact Us</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Contact Form -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <form>
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="name" class="mt-1 p-2 w-full border rounded-md"
                                        placeholder="Your Name">
                                </div>
                                <div class="mb-4">
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" class="mt-1 p-2 w-full border rounded-md"
                                        placeholder="Your Email">
                                </div>
                                <div class="mb-4">
                                    <label for="message"
                                        class="block text-sm font-medium text-gray-700">Message</label>
                                    <textarea id="message" rows="4" class="mt-1 p-2 w-full border rounded-md" placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit"
                                    class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Send
                                    Message</button>
                            </form>
                        </div>

                        <!-- Comments Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-4">Comments</h3>
                            <div class="space-y-4">
                                <div class="p-4 bg-gray-200 rounded-lg">
                                    <p class="text-sm text-gray-800"><strong>John Doe:</strong> Great service! Highly
                                        recommend.</p>
                                </div>
                                <div class="p-4 bg-gray-200 rounded-lg">
                                    <p class="text-sm text-gray-800"><strong>Jane Smith:</strong> Very responsive and
                                        helpful team.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Google Maps Full Width -->
                    <div class="mt-8 rounded-lg overflow-hidden shadow-md">
                        <iframe class="w-full h-96"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093645!2d144.95373531590467!3d-37.81627974201244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df0f9f15f%3A0x2b2e6c682c7f42ae!2sMelbourne%2C%20Australia!5e0!3m2!1sen!2sus!4v1630833295278!5m2!1sen!2sus"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </section>
            <div x-data="statistikData()">
                <!-- Bagian Header -->
                <div class="header flex flex-col items-center justify-center gap-4 mb-6">
                    <h2 class="text-3xl font-bold text-center">Statistik Kunjungan Pasien</h2>
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
    <x-footer></x-footer>
</body>

</html>
