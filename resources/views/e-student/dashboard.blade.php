<x-app-layout>
    
    {{-- Slot Header Breeze untuk Judul Halaman --}}
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h1>
    </x-slot>

    
    {{-- Main Content Area - Menggunakan grid container Breeze --}}
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center bg-[#4b2aad] p-4 sm:rounded ">
             {{-- INI TOMBOL TOGGLE-nya --}}
             <button 
    @click="isSidebarOpen = !isSidebarOpen" 
    class="text-white hover:text-gray-900 focus:outline-none p-2 mr-4"
>

    <!-- ICON KETIKA SIDEBAR TERTUTUP (MENU ICON) -->
    <template x-if="!isSidebarOpen">
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 21 21" 
            fill="none" 
            stroke="white"
            stroke-linecap="round" 
            stroke-linejoin="round"
            class="w-10 h-10"
        >
            <!-- garis menu -->
            <path d="M7.5 6 H15.5" />
            <path d="M7.5 10 H12.5" />
            <path d="M7.5 14 H15.5" />

            <!-- bullet -->
            <circle cx="4.5" cy="6" r="1" fill="white" />
            <circle cx="4.5" cy="10" r="1" fill="white" />
            <circle cx="4.5" cy="14" r="1" fill="white" />
        </svg>
    </template>

    <!-- ICON KETIKA SIDEBAR TERBUKA (ARROW LEFT) -->
    <template x-if="isSidebarOpen">
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="white"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-10 h-10"
        >
            <path d="M15 6 L9 12 L15 18" />
        </svg>
    </template>

</button>


             <h1 class="text-2xl font-semibold text-white leading-tight">
                 {{ __('Dashboard ') }}
             </h1>
        </div><br>
            {{-- Mengganti body/main tag dengan div yang diberi shadow dan bg white --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                
                {{-- Grid Konten Utama (2 kolom kiri: Info & Jadwal, 1 kolom kanan: Grafik IPK) --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- --- Kiri: Info dan Jadwal (lg:col-span-2) --- --}}
                    <div class="lg:col-span-2 space-y-6">
                        
                        {{-- 1. e-Student Info Card (Red Theme) --}}
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-red-300">
                            <div class="bg-red-600 text-white px-5 py-3 flex justify-between items-center cursor-pointer rounded-t-xl hover:bg-red-700 transition duration-150" onclick="toggleCard('info-body')">
                                <h2 class="text-lg font-semibold flex items-center">
                                    <i class="fas fa-info-circle mr-3"></i> e-Student Info
                                </h2>
                                {{-- Gunakan class 'rotate-180' untuk indikasi card tertutup --}}
                                <i class="fas fa-chevron-down transform transition duration-300" id="info-icon"></i>
                            </div>
                            <div class="p-5" id="info-body">
                                {{-- Contoh data dinamis dari Laravel (misal dari Auth::user()) --}}
                                <p class="text-gray-800 text-lg font-medium mb-2">Welcome, **{{ Auth::user()->name ?? 'Mahasiswa' }}**</p>
                                <p class="text-gray-600 mb-2">This facility is specifically for **LP3I** students who are still active.</p>
                                <p class="text-sm text-gray-500">For that, please use it properly and serve as a means for you to see the development of the study record data that is already in it.</p>
                            </div>
                        </div>

                        {{-- 2. College Subject Schedule Card (Blue Theme) --}}
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-300">
                            <div class="bg-blue-500 text-white px-5 py-3 flex justify-between items-center cursor-pointer rounded-t-xl hover:bg-blue-600 transition duration-150" onclick="toggleCard('schedule-body')">
                                <h2 class="text-lg font-semibold flex items-center">
                                    <i class="fas fa-calendar-alt mr-3"></i> College Subject Schedule
                                </h2>
                                <i class="fas fa-chevron-down transform transition duration-300" id="schedule-icon"></i>
                            </div>
                            <div class="p-0" id="schedule-body">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-blue-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Times</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Courses</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rooms</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lecturer</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                            {{-- Contoh Looping Data (Idealnya dari Controller) --}}
                                            @php
                                                $schedules = [
                                                    ['d' => 'Wednesday', 't' => '08:50-11:30', 'c' => 'K3 & ISO', 'r' => 'Bj. Habibie 1', 'l' => 'Nisa Pamulaningtyas, S.E., M.E.'],
                                                    ['d' => 'Wednesday', 't' => '13:00-14:40', 'c' => 'System Design Analyst', 'r' => 'Lab. Bill Gates', 'l' => 'Eko Marmanto P.U, S.Kom, M.Kom...'],
                                                    ['d' => 'Thursday', 't' => '18:30-22:00', 'c' => 'Mobile Programming', 'r' => 'Lab. Bill Gates', 'l' => 'Joko Kristianto, S.T'],
                                                    ['d' => 'Friday', 't' => '13:00-14:40', 'c' => 'Digital Literacy', 'r' => 'Pullman', 'l' => 'Dadang Surya Kencana, S.E, M.M.'],
                                                    ['d' => 'Friday', 't' => '14:50-16:30', 'c' => 'Design Graphics 2', 'r' => 'Lab. Bill Gates', 'l' => 'Rahadian Dwimaribibi, S.Kom'],
                                                    ['d' => 'Saturday', 't' => '08:00-11:30', 'c' => 'Framework Programming', 'r' => 'Lab. Bill Gates', 'l' => 'Anas Fajar Pratama, S.Kom.'],
                                                    ['d' => 'Saturday', 't' => '13:00-16:30', 'c' => 'Network Security', 'r' => 'Lab. Soekarno', 'l' => 'Lillip Harliyandi Zakaria, S.Kom.'],
                                                ];
                                            @endphp
                                            
                                            @foreach($schedules as $key => $schedule)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $schedule['d'] }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $schedule['t'] }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-blue-600">{{ $schedule['c'] }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $schedule['r'] }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $schedule['l'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    {{-- --- Kanan: IPK Graph (lg:col-span-1) --- --}}
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-indigo-300 h-full">
                            <div class="bg-indigo-600 text-white px-5 py-3 flex justify-between items-center rounded-t-xl">
                                <h2 class="text-lg font-semibold flex items-center">
                                    <i class="fas fa-chart-line mr-3"></i> Development Graph of GPA (IPK)
                                </h2>
                            </div>
                            <div class="p-5 h-[350px]">
                                {{-- Canvas untuk Chart.js --}}
                
                        <canvas id="gpaChart"></canvas>
                    
                            </div>
                            <div class="p-5 border-t border-gray-100 bg-gray-50 rounded-b-xl">
                                <p class="text-gray-700 font-medium">Current Cumulative GPA (IPK): <span class="text-2xl font-bold text-indigo-600">3.05</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    {{-- Menambahkan JavaScript & Chart.js di bagian akhir body --}}
    @push('scripts')
    
    {{-- Memuat Chart.js dari CDN. Pastikan link ini diakses oleh Vite --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <script>
        // --- 1. Fungsi Toggle Card (Info dan Jadwal) ---
        // Fungsi ini sederhana karena hanya menggunakan class Tailwind 'hidden' dan 'rotate-180'
        window.toggleCard = function(bodyId) {
            const body = document.getElementById(bodyId);
            const icon = document.getElementById(bodyId.replace('body', 'icon'));
            
            // Toggle visibility
            body.classList.toggle('hidden');
            
            // Putar ikon panah 180 derajat saat tertutup
            icon.classList.toggle('rotate-180'); 
        }

        // --- 2. Fungsi Inisialisasi Grafik IPK ---
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('gpaChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Sm 1', 'Sm 2', 'Sm 3', 'Sm 4', 'Sm 5', 'Sm 6'],
                        datasets: [{
                            label: 'IP Semester',
                            data: [3.50, 3.75, 3.68, 3.80, 3.90, 3.85],
                            backgroundColor: 'rgba(109, 40, 217, 0.1)',
                            borderColor: '#4F46E5',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.3, // Membuat garis melengkung
                            pointBackgroundColor: '#4F46E5',
                            pointRadius: 5,
                            pointHoverRadius: 7,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: false,
                                min: 2.5,
                                max: 4.0,
                                ticks: {
                                    stepSize: 0.25
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                padding: 12,
                                callbacks: {
                                    label: function(context) {
                                        return `IP: ${context.formattedValue}`;
                                    }
                                }
                            }
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }
                    }
                });
            }
        });
    
    </script>
    @endpush
</x-app-layout>