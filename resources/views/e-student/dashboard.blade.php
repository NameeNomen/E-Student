<x-app-layout>
    {{-- Background Header Besar (Biru Tua LP3I) --}}
    <div class="bg-[#004269] pb-32 pt-10 sm:rounded">
        <div class="max-w-7xl mx-auto px-4 ">
            <div class="flex justify-between items-center text-white mb-6">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight">Dashboard</h2>
                    <p class="text-blue-200 text-sm mt-1">
                       {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
                    </p>
                </div>
                
                <!-- {{-- Tombol Toggle Sidebar (Floating) --}}
                <button @click="isSidebarOpen = !isSidebarOpen" class="p-2 bg-white/10 hover:bg-white/20 rounded-xl backdrop-blur-sm transition border border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button> -->
            </div>
        </div>
    </div>

    {{-- Main Content Container (Naik ke atas menumpuk background header) --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 pb-12">
        
        {{-- ROW 1: Quick Stats / Highlight Cards (Floating) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            {{-- Card 1: Welcome & Profile (White Theme) --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110"></div>
                <div class="relative z-10">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="h-12 w-12 rounded-full bg-[#004269] flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            {{ substr(Auth::user()->name ?? 'M', 0, 1) }}
                        </div>
                        <div>
                            <p class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Mahasiswa Aktif</p>
                            <h3 class="text-lg font-bold text-slate-800 truncate w-40">{{ Auth::user()->name ?? 'Mahasiswa' }}</h3>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div>
                            <span class="text-3xl font-bold text-[#004269]">3.05</span>
                            <span class="text-sm text-slate-500 block">IPK Saat Ini</span>
                        </div>
                        <a href="{{ route('lihatProfile.index') }}" class="text-sm font-semibold text-[#004269] hover:underline transition">Lihat Profil →</a>
                    </div>
                </div>
            </div>

            {{-- Card 2: Next Class (Variant of Dark Blue - Lighter Shade) --}}
            {{-- Menggunakan warna turunan dari 004269 namun sedikit lebih terang agar beda --}}
            <div class="bg-[#1c5b85] rounded-3xl p-6 shadow-xl text-white relative overflow-hidden group hover:shadow-2xl hover:shadow-blue-900/20 transition-all duration-300">
                <div class="absolute right-0 top-0 p-4 opacity-10 transform rotate-12 group-hover:rotate-0 transition duration-500">
                    <i class="fas fa-clock text-8xl"></i>
                </div>
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div>
                        <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/20 text-xs font-medium backdrop-blur-sm mb-3">
                            <span class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></span>
                            Kelas Berikutnya
                        </div>
                        <h3 class="text-xl font-bold leading-tight">Mobile Programming</h3>
                        <p class="text-blue-100 text-sm mt-1">Lab. Bill Gates</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20 flex items-center justify-between">
                        <span class="text-lg font-bold">18:30 WIB</span>
                        <button class="bg-white text-[#004269] p-2 rounded-xl hover:bg-blue-50 transition shadow-lg">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Card 3: Info Penting (White Theme with Blue Accent) --}}
            <div class="bg-white rounded-3xl p-6 shadow-xl relative overflow-hidden border-b-4 border-[#004269]">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 rounded-2xl text-[#004269]">
                        <i class="fas fa-bullhorn text-xl"></i>
                    </div>
                    <span class="bg-blue-100 text-[#004269] text-xs font-bold px-2 py-1 rounded">PENTING</span>
                </div>
                <h3 class="text-slate-800 font-bold mb-2">e-Student Info</h3>
                <p class="text-slate-500 text-sm line-clamp-2 leading-relaxed">
                    Mohon lengkapi data administrasi sebelum UTS dimulai. Cek detail pembayaran di menu keuangan.
                </p>
                <div class="mt-4">
                    <button onclick="toggleCard('info-detail')" class="w-full py-2 rounded-xl border border-blue-100 text-[#004269] text-sm font-semibold hover:bg-[#004269] hover:text-white transition duration-200">
                        Baca Selengkapnya
                    </button>
                </div>
            </div>
        </div>

        {{-- ROW 2: Main Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- LEFT: Schedule Timeline & Graph --}}
            <div class="lg:col-span-2 space-y-8">
                
                {{-- Schedule Section --}}
                <div class="bg-white rounded-[2rem] shadow-lg p-8 border border-slate-100">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800">Jadwal Hari Ini</h3>
                            <p class="text-slate-400 text-sm mt-1">Semester Genap 2024</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="p-2 text-slate-400 hover:text-[#004269] transition"><i class="fas fa-chevron-left"></i></button>
                            <button class="p-2 text-slate-400 hover:text-[#004269] transition"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>

                    <div class="relative space-y-8 before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent">
                        
                        @php
                            $schedules = [
                                ['d' => 'Rabu', 't' => '08:50', 'e' => '11:30', 'c' => 'K3 & ISO', 'r' => 'Bj. Habibie 1', 'l' => 'Nisa P., S.E.', 'status' => 'Selesai', 'color' => 'text-slate-400'],
                                ['d' => 'Rabu', 't' => '13:00', 'e' => '14:40', 'c' => 'System Design Analyst', 'r' => 'Lab. Bill Gates', 'l' => 'Eko M., M.Kom', 'status' => 'Berjalan', 'color' => 'text-[#004269]'],
                                ['d' => 'Kamis', 't' => '18:30', 'e' => '22:00', 'c' => 'Mobile Programming', 'r' => 'Lab. Bill Gates', 'l' => 'Joko K., S.T', 'status' => 'Akan Datang', 'color' => 'text-[#1c5b85]'],
                            ];
                        @endphp

                        @foreach($schedules as $sch)
                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            
                            <!-- Icon / Dot -->
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white bg-slate-100 group-hover:bg-[#004269] group-hover:text-white transition shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 text-slate-400">
                                <i class="fas fa-book text-xs"></i>
                            </div>
                            
                            <!-- Content Card -->
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-2xl border border-slate-100 shadow-sm group-hover:shadow-md group-hover:border-[#004269]/30 transition duration-300">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs font-bold {{ $sch['color'] }} bg-slate-50 px-2 py-1 rounded-lg uppercase tracking-wide">{{ $sch['d'] }}</span>
                                    <span class="text-xs text-slate-400 font-mono">{{ $sch['t'] }} - {{ $sch['e'] }}</span>
                                </div>
                                <h4 class="font-bold text-slate-800 text-lg mb-1">{{ $sch['c'] }}</h4>
                                <div class="flex items-center text-sm text-slate-500 gap-3">
                                    <span class="flex items-center gap-1"><i class="fas fa-map-marker-alt text-[#004269]"></i> {{ $sch['r'] }}</span>
                                    <span class="flex items-center gap-1"><i class="fas fa-user text-slate-400"></i> {{ substr($sch['l'], 0, 10) }}...</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    
                    <div class="mt-8 text-center">
                         <a href="#" class="inline-block py-2 px-6 rounded-full bg-slate-50 text-slate-600 text-sm font-semibold hover:bg-[#004269] hover:text-white transition">Lihat Seluruh Jadwal</a>
                    </div>
                </div>

                {{-- Graph Section --}}
                <div class="bg-white rounded-[2rem] shadow-lg p-8 border border-slate-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-800">Statistik IPK</h3>
                        <select class="bg-slate-50 border-none text-sm text-slate-500 rounded-lg focus:ring-[#004269]">
                            <option>Semua Semester</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    <div class="h-64 relative">
                        <canvas id="gpaChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Quick Menu & Extras --}}
            <div class="space-y-6">
                
                {{-- Quick Actions Grid --}}
                <div class="bg-white rounded-[2rem] shadow-lg p-6 border border-slate-100">
                    <h3 class="text-lg font-bold text-slate-800 mb-4 px-2">Menu Cepat</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- KRS -->
                        <a href="#" class="flex flex-col items-center justify-center p-4 rounded-2xl bg-blue-50 text-[#004269] hover:bg-[#004269] hover:text-white transition duration-300 group">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center mb-2 shadow-sm group-hover:scale-110 transition">
                                <i class="fas fa-file-alt text-[#004269]"></i>
                            </div>
                            <span class="text-xs font-bold">KRS Online</span>
                        </a>
                        <!-- Keuangan -->
                        <a href="#" class="flex flex-col items-center justify-center p-4 rounded-2xl bg-slate-50 text-[#004269] hover:bg-[#004269] hover:text-white transition duration-300 group">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center mb-2 shadow-sm group-hover:scale-110 transition">
                                <i class="fas fa-wallet text-[#004269]"></i>
                            </div>
                            <span class="text-xs font-bold">Keuangan</span>
                        </a>
                        <!-- KHS -->
                        <a href="#" class="flex flex-col items-center justify-center p-4 rounded-2xl bg-blue-50 text-[#004269] hover:bg-[#004269] hover:text-white transition duration-300 group">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center mb-2 shadow-sm group-hover:scale-110 transition">
                                <i class="fas fa-print text-[#004269]"></i>
                            </div>
                            <span class="text-xs font-bold">Cetak KHS</span>
                        </a>
                        <!-- Profil -->
                        <a href="{{}}" class="flex flex-col items-center justify-center p-4 rounded-2xl bg-slate-50 text-[#004269] hover:bg-[#004269] hover:text-white transition duration-300 group">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center mb-2 shadow-sm group-hover:scale-110 transition">
                                <i class="fas fa-user-cog text-[#004269]"></i>
                            </div>
                            <span class="text-xs font-bold">Pengumuman</span>
                        </a>
                    </div>
                </div>

                {{-- Mini Academic Status --}}
                <!-- <div class="bg-[#004269] rounded-[2rem] shadow-xl p-6 text-white relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-[#1c5b85] rounded-full opacity-30 blur-xl"></div>
                    <h3 class="font-bold text-lg mb-4 relative z-10">Status Akademik</h3>
                    <ul class="space-y-4 relative z-10">
                        <li class="flex justify-between items-center border-b border-white/10 pb-2">
                            <span class="text-blue-200 text-sm">Total SKS</span>
                            <span class="font-bold text-xl">114</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-white/10 pb-2">
                            <span class="text-blue-200 text-sm">Max SKS (Sem Depan)</span>
                            <span class="font-bold text-xl">24</span>
                        </li>
                        <li class="flex justify-between items-center pt-1">
                            <span class="text-blue-200 text-sm">Dosen Wali</span>
                            <span class="font-semibold text-sm text-right">Dr. Budi Santoso</span>
                        </li>
                    </ul>
                </div> -->

            </div>

        </div>

        {{-- Hidden Detail Info (For JS Toggle) --}}
        <div id="info-detail" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4">
            <div class="bg-white rounded-3xl p-8 max-w-lg w-full shadow-2xl relative animate-bounce-in">
                <button onclick="toggleCard('info-detail')" class="absolute top-4 right-4 p-2 rounded-full bg-slate-100 hover:bg-slate-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </button>
                <h3 class="text-2xl font-bold text-[#004269] mb-4">Detail Informasi</h3>
                <div class="prose text-slate-600">
                    <p>Mahasiswa wajib melakukan registrasi ulang sebelum tanggal 20. Keterlambatan akan dikenakan denda administratif.</p>
                    <p>Silakan hubungi bagian keuangan jika terdapat ketidaksesuaian tagihan.</p>
                </div>
            </div>
        </div>

    </div>
    
    @push('scripts')
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <script>
        // Toggle Function
        window.toggleCard = function(id) {
            const el = document.getElementById(id);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }

        // Chart Initialization
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('gpaChart');
            
            // Menggunakan warna gradient Biru Tua yang pudar
            let gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(0, 66, 105, 0.2)'); 
            gradient.addColorStop(1, 'rgba(0, 66, 105, 0.0)');

            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Sm 1', 'Sm 2', 'Sm 3', 'Sm 4', 'Sm 5', 'Sm 6'],
                        datasets: [{
                            label: 'IPK',
                            data: [3.50, 3.75, 3.68, 3.80, 3.90, 3.85],
                            backgroundColor: gradient,
                            borderColor: '#004269', // Warna garis utama
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#004269',
                            pointRadius: 5,
                            pointHoverRadius: 7
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { beginAtZero: false, min: 2.0, max: 4.0, grid: { borderDash: [5, 5] } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</x-app-layout>