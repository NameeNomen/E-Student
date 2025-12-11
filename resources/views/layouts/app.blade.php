<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        /* Menggunakan font Poppins jika tersedia, fallback ke sans-serif */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9; /* Warna background yang lebih lembut */
        }
        /* Style untuk flyout menu */
        .flyout-menu {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateX(-10px);
            opacity: 0;
            pointer-events: none; /* Nonaktifkan interaksi saat tersembunyi */
        }
        .flyout-menu.active {
            transform: translateX(0);
            opacity: 1;
            pointer-events: auto; /* Aktifkan interaksi saat aktif */
        }

        /* Warna khusus untuk konsistensi */
        .bg-primary { background-color: #004269; }
        .text-accent { color: #009DA5; }
        .bg-accent { background-color: #009DA5; }
    </style>
</head>

<body class="font-sans antialiased bg-[#f4f7f9]">

    <div x-data="{ isMobileSidebarOpen: false, activeDropdown: null }" class="min-h-screen flex">
        
        <div 
            x-show="isMobileSidebarOpen" 
            @click="isMobileSidebarOpen = false; activeDropdown = null" 
            x-transition:enter="ease-out duration-300"
            x-transition:leave="ease-in duration-200"
            class="fixed inset-0 bg-black/50 z-40 lg:hidden" 
            style="display: none;"
        ></div>

        {{-- 1. SIDEBAR (Fixed & Controlled) --}}
        <aside 
            x-bind:class="{ 'translate-x-0': isMobileSidebarOpen }" 
            class="w-64 bg-primary text-white min-h-screen shadow-2xl fixed left-0 top-0 z-50 transform transition-transform duration-300 -translate-x-full lg:translate-x-0 flex flex-col justify-between"
        > 
            <div>
                {{-- START: LOGO SECTION (Diubah ke SVG estetik) --}}
                <div class="p-4 border-b border-white/10 flex items-center justify-center">
                    <a href="{{ route('dashboard') }}" class="text-white">
                        <div class="flex items-center space-x-2">
                            {{-- Placeholder SVG E-Student (Ganti dengan SVG asli Anda) --}}
                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7V17L12 22L22 17V7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 2L12 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 7L12 12L22 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17L12 12L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <span class="text-xl font-bold">E-Student</span>
                                <span class="block text-xs text-white/70 leading-none">Information System</span>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- END: LOGO SECTION --}}


                {{-- START: NAVIGATION LINKS --}}
                <nav class="mt-4 space-y-1">
                    @php
                        $currentRoute = Route::currentRouteName();
                        // Kelas untuk menu aktif (Warna accent)
                        $activeClass = 'bg-accent text-white font-semibold shadow-lg';
                        // Kelas untuk menu hover
                        $hoverClass = 'hover:bg-[#005a8f] hover:text-gray-100'; // Hover yang sedikit lebih gelap dari primary
                        // Kelas dasar untuk tata letak menu
                        $baseClass = 'relative flex items-center px-6 py-3 transition duration-150 ease-in-out mx-3 rounded-lg';
                        
                        // Menentukan rute yang termasuk dalam Dropdown Academic
                        $academicRoutes = ['krs.menu', 'score.index'];
                        $isAcademicActive = in_array($currentRoute, $academicRoutes);

                        // Menentukan rute yang termasuk dalam Dropdown Learning
                        $learningRoutes = ['tugas.index', 'materi', 'ebook.search'];
                        $isLearningActive = in_array($currentRoute, $learningRoutes);

                    @endphp

                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}" 
                        class="{{ $baseClass }} {{ $currentRoute == 'dashboard' ? $activeClass : $hoverClass }}"
                        @click="activeDropdown = null; isMobileSidebarOpen = false">
                        <i class="fas fa-chart-line w-5 mr-3"></i> 
                        Dashboard
                    </a>

                    {{-- Academic Data (Flyout Menu) --}}
                    <div class="relative">
                        <button 
                            @click.prevent="activeDropdown = (activeDropdown === 'academicDropdown' ? null : 'academicDropdown')" 
                            class="{{ $baseClass }} w-full text-left focus:outline-none {{ $isAcademicActive ? $activeClass : $hoverClass }}">
                            <i class="fas fa-graduation-cap w-5 mr-3"></i>
                            Academic Data
                            <i class="fas fa-chevron-right text-xs ml-auto transition-transform p-2"
                                :class="{ 'rotate-90': activeDropdown === 'academicDropdown' }"></i>
                        </button>
                        
                        {{-- FLYOUT ITEMS --}}
                        <div 
                            x-cloak 
                            x-show="activeDropdown === 'academicDropdown'"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-x-[-10px]"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 translate-x-[-10px]"
                            @click.away="activeDropdown = null"
                            class="absolute left-64 top-0 p-3 bg-white shadow-xl rounded-xl z-50 min-w-[200px] border border-gray-200 text-gray-800 space-y-1 lg:ml-2">
                            
                            <a href="{{ route('krs.menu') }}" 
                                class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg transition duration-150"
                                @click="isMobileSidebarOpen = false">
                                <i class="fas fa-file-alt w-4 mr-2 text-accent"></i>
                                KRS (Study Plan)
                            </a>

                            <a href="{{ route('score') }}" 
                                class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg transition duration-150"
                                @click="isMobileSidebarOpen = false">
                                <i class="fas fa-chart-bar w-4 mr-2 text-accent"></i>
                                Score
                            </a>
                        </div>
                    </div>

                    {{-- Learning Data (Flyout Menu) --}}
                    <div class="relative">
                        <button 
                            @click.prevent="activeDropdown = (activeDropdown === 'learningDropdown' ? null : 'learningDropdown')" 
                            class="{{ $baseClass }} w-full text-left focus:outline-none {{ $isLearningActive ? $activeClass : $hoverClass }}">
                            <i class="fas fa-book w-5 mr-3"></i>
                            Learning Data
                            <i class="fas fa-chevron-right text-xs ml-auto transition-transform p-2"
                                :class="{ 'rotate-90': activeDropdown === 'learningDropdown' }"></i>
                        </button>

                        {{-- FLYOUT ITEMS --}}
                        <div 
                            x-cloak 
                            x-show="activeDropdown === 'learningDropdown'"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-x-[-10px]"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 translate-x-[-10px]"
                            @click.away="activeDropdown = null"
                            class="absolute left-64 top-0 p-3 bg-white shadow-xl rounded-xl z-50 min-w-[200px] border border-gray-200 text-gray-800 space-y-1 lg:ml-2">
                            
                            <a href="{{ route('tugas.index') }}"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg transition duration-150"
                                @click="isMobileSidebarOpen = false">
                                <i class="fas fa-tasks w-4 mr-2 text-accent"></i>
                                Assignment Box
                            </a>

                            <a href="{{ route('materi') }}" 
                                class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg transition duration-150"
                                @click="isMobileSidebarOpen = false">
                                <i class="fas fa-book-open w-4 mr-2 text-accent"></i>
                                Materials
                            </a>

                            <a href="{{ route('ebook.search') }}" 
                                class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg transition duration-150"
                                @click="isMobileSidebarOpen = false">
                                <i class="fas fa-book-reader w-4 mr-2 text-accent"></i>
                                Ebook
                            </a>
                        </div>
                    </div>

                    {{-- Billing Info --}}
                    <a href="{{ route('billing.info') }}" 
                        class="{{ $baseClass }} {{ $currentRoute == 'billing.info' ? $activeClass : $hoverClass }}"
                        @click="activeDropdown = null; isMobileSidebarOpen = false">
                        <i class="fas fa-credit-card w-5 mr-3"></i>
                        Billing Info
                    </a>

                    {{-- Announcement --}}
                    <a href="{{ route('announcements.index') }}" 
                        class="{{ $baseClass }} {{ $currentRoute == 'announcements.index' ? $activeClass : $hoverClass }}"
                        @click="activeDropdown = null; isMobileSidebarOpen = false">
                        <i class="fas fa-bullhorn w-5 mr-3"></i>
                        Announcement
                    </a>
                </nav>
                {{-- END: NAVIGATION LINKS --}}
            </div>

            {{-- Logout section --}}
            <div class="w-full p-4 border-t border-white/20">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-3 py-2 text-white/80 hover:bg-red-600 hover:text-white rounded-lg transition duration-150">
                        <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                        <b>Logout</b>
                    </button>
                </form>
            </div>
        </aside>

        {{-- 2. KONTEN HALAMAN UTAMA (Bergeser ke Kanan) --}}
        <main class="flex-1 transition-all duration-300 lg:ml-64 flex flex-col">
            
            <header class="sticky top-0 bg-white shadow-md p-4 z-30 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                         <button @click="isMobileSidebarOpen = !isMobileSidebarOpen; activeDropdown = null" class="text-gray-700 p-2 rounded-md hover:bg-gray-200 lg:hidden">
                            <i class="fas fa-bars w-6 h-6"></i>
                        </button>
                        
                        <h1 class="text-xl font-extrabold text-gray-800 ml-3 hidden sm:block">
                            Student Information System
                        </h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="#" class="flex items-center space-x-2 p-2 rounded-xl hover:bg-gray-100 transition group">
                            <img src="https://placehold.co/40x40/004269/fcd34d?text=AA" class="w-8 h-8 rounded-full border-2 border-accent" alt="Profile">
                            <div class="hidden sm:block">
                                <p class="text-sm font-semibold text-gray-800">da</p>
                                <p class="text-xs text-gray-500">Student</p>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-500 hidden sm:block"></i>
                        </a>
                    </div>
                </div>

            </header>
            
            <div class="relative flex-1 p-6">
                {{-- Canvas Pola (Menggunakan gambar dari uploadan Anda sebagai referensi) --}}
                <div class="absolute inset-0 opacity-10 pointer-events-none z-0 overflow-hidden">
                    {{-- Ganti URL gambar dengan path ke pola SVG/Image yang Anda inginkan --}}
                    <div class="w-full h-full bg-contain bg-no-repeat bg-right" style="background-image: url('{{ asset('images/polabackground.png') }}'); opacity: 0.3;"></div>
                    
                    {{-- Jika ingin menggunakan pola CSS dasar (Contoh: Hexagon) --}}
                    {{-- <div class="w-full h-full p-4" style="background-color: #ffffff; background-image: radial-gradient(#004269 1px, transparent 0); background-size: 20px 20px; opacity: 0.1;"></div> --}}
                </div>

                <div class="relative z-10">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </div>

            <div class="px-6 pb-6 mt-auto">
                {{-- Pastikan component x-app-footer ada di folder components --}}
                <x-app-footer /> 
            </div>
        </main>
        
    </div>
    
</body>
</html>