<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body{
            font-family:"poppins";
        }
    </style>
</head>

{{-- [RESPONSIVE] Menghapus x-data dari body, karena sudah ada di div di bawah --}}
<body class="font-sans antialiased bg-gray-100">

    {{-- [RESPONSIVE] Mengganti 'isSidebarOpen' menjadi 'isMobileSidebarOpen' dan default-nya 'false' --}}
    <div x-data="{ isMobileSidebarOpen: false }" class="min-h-screen">
        
        <!-- [RESPONSIVE] Menambahkan Overlay untuk mobile saat sidebar terbuka -->
        <div 
            x-show="isMobileSidebarOpen" 
            @click="isMobileSidebarOpen = false" 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 z-30 lg:hidden" 
            style="display: none;"
        ></div>

        {{-- 1. SIDEBAR (Fixed & Controlled) --}}
        {{-- [RESPONSIVE] Mengubah class untuk state default (mobile hidden, desktop visible) --}}
        {{-- [RESPONSIVE] Mengubah x-bind untuk 'isMobileSidebarOpen' --}}
        <aside 
            x-bind:class="{ 'translate-x-0': isMobileSidebarOpen }" 
            class="w-64 bg-[#4b2aad] text-white min-h-screen shadow-2xl fixed left-0 top-0 z-40 transform transition-transform duration-300 -translate-x-full lg:translate-x-0"
        > 

            {{-- START: LOGO SECTION --}}
            <div class="p-4 border-b border-white/10">
                <div class="bg-white rounded-lg p-2 flex items-center space-x-1 shadow-lg w-fit">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-900">
                        <span class="text-yellow-500">e</span>Student
                    </a>
                    <span class="text-xs text-gray-600 font-medium">Information System</span>
                </div>
            </div>
            {{-- END: LOGO SECTION --}}


            {{-- START: NAVIGATION LINKS (TATA LETAK MENU DIPERBAIKI) --}}
            <nav class="mt-4 space-y-1">
                @php
                    $currentRoute = Route::currentRouteName();
                    // Kelas untuk menu aktif (KUNING)
                    $activeClass = 'bg-yellow-500 text-black font-extrabold shadow-md';
                    // Kelas untuk menu hover (UNGU CERAH)
                    $hoverClass = 'hover:bg-purple-700 hover:text-gray-100';
                    // Kelas dasar untuk tata letak menu
                    $baseClass = 'flex items-center px-6 py-2 transition duration-150 ease-in-out rounded-lg mx-3';
                @endphp

                {{-- Dashboard --}}
                <a href="{{ route('dashboard') }}" 
                   class="{{ $baseClass }} {{ $currentRoute == 'dashboard' ? $activeClass : $hoverClass }}">
                    <i class="fas fa-chart-line w-5 mr-3"></i> 
                    Dashboard
                </a>

               {{-- Academic Data --}}
                <div class="relative">

                {{-- BUTTON DROPDOWN --}}
                <button 
                    onclick="toggleDropdown('academicDropdown')" 
                    class="{{ $baseClass }} 
                        {{ in_array($currentRoute, ['krs.menu','score.index','exam.card']) ? $activeClass : $hoverClass }}">
                    <i class="fas fa-graduation-cap w-5 mr-3"></i>
                    Academic Data
                    <i id="arrow-academicDropdown" 
                    class="fas fa-chevron-down text-xs ml-auto transition-transform p-2"></i>
                </button>

                {{-- DROPDOWN ITEMS --}}
                <div 
                    id="academicDropdown" 
                    class="hidden text-white shadow-xl rounded-lg mt-1 ml-10"
                >
                    <a href="{{ route('krs.menu') }}" 
                    class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100">
                        <i class="fas fa-file-alt w-4 mr-2 text-white"></i>
                        KRS (Study Plan)
                    </a>

                    <a href="{{ route('score.index') }}" 
                    class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100">
                        <i class="fas fa-chart-bar w-4 mr-2 text-white"></i>
                        Score
                    </a>

                    <a href="{{ route('exam.card') }}" 
                    class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100 rounded-b-lg">
                        <i class="fas fa-id-card w-4 mr-2 text-white"></i>
                        Exam Card
                    </a>
                </div>

            </div>


                

                {{-- Learning Data --}}
<div class="relative">

    {{-- BUTTON DROPDOWN --}}
    <button 
        onclick="toggleDropdown('learningDropdown')" 
        class="{{ $baseClass }} 
            {{ in_array($currentRoute, ['materials.index','schedule.lecturer','ebook.search']) ? $activeClass : $hoverClass }}">
        <i class="fas fa-book w-5 mr-3"></i>
        Learning Data

        <i id="arrow-learningDropdown" 
           class="fas fa-chevron-down text-xs ml-auto transition-transform p-2"></i>
    </button>

    {{-- DROPDOWN ITEMS --}}
    <div 
        id="learningDropdown" 
        class="hidden text-white shadow-xl rounded-lg mt-1 ml-10"
    >
        <a href="#" 
           class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100 rounded-t-lg">
            <i class="fas fa-tasks w-4 mr-2 text-white"></i>
            Assignment Box
        </a>

        <a href="{{ route('schedule.lecturer') }}" 
           class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100">
            <i class="fas fa-user-tie w-4 mr-2 text-white"></i>
            Lecturer Schedule
        </a>

        <a href="{{ route('materials.index') }}" 
           class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100">
            <i class="fas fa-book-open w-4 mr-2 text-white"></i>
            Materials
        </a>

        <a href="{{ route('ebook.search') }}" 
           class="flex items-center px-4 py-2 hover:bg-purple-700 hover:text-gray-100 rounded-b-lg">
            <i class="fas fa-book-reader w-4 mr-2 text-white"></i>
            Ebook
        </a>
    </div>

</div>


                {{-- Billing Info --}}
                <a href="{{ route('billing.info') }}" 
                   class="{{ $baseClass }} {{ $currentRoute == 'billing.info' ? $activeClass : $hoverClass }}">
                    <i class="fas fa-credit-card w-5 mr-3"></i>
                    Billing Info
                </a>

                {{-- Announcement --}}
                <a href="{{ route('announcements.index') }}" 
                   class="{{ $baseClass }} {{ $currentRoute == 'announcements.index' ? $activeClass : $hoverClass }}">
                    <i class="fas fa-bullhorn w-5 mr-3"></i>
                    Announcement
                </a>
            </nav>
            {{-- END: NAVIGATION LINKS --}}

            {{-- Profile section --}}
            <div class="absolute bottom-0 w-full p-4 border-t border-white/20">
                <div class="flex items-center space-x-3">
                    <img src="https://placehold.co/40x40/fcd34d/4b5563?text=AA" class="w-10 h-10 rounded-full border-2 border-yellow-300" alt="Profile">
                    <div>
                        <p class="font-semibold text-white">da</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-sm text-white/80 hover:underline"><b>Logout</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        {{-- 2. KONTEN HALAMAN UTAMA (Bergeser ke Kanan) --}}
        {{-- [RESPONSIVE] Menghapus binding :class dan pt-6. Menambahkan lg:ml-64 --}}
        <main class="transition-all duration-300 lg:ml-64">
            
            <!-- [RESPONSIVE] Menambahkan Header Bar baru untuk toggle mobile -->
            <header class="sticky top-0 bg-white shadow-sm p-4 z-20 border-b border-gray-200">
                <div class="flex items-center">
                    <!-- Tombol Hamburger (Hanya tampil di mobile) -->
                    <button @click="isMobileSidebarOpen = !isMobileSidebarOpen" class="text-gray-700 p-2 rounded-md hover:bg-gray-200 lg:hidden">
                        <i class="fas fa-bars w-6 h-6"></i>
                    </button>
                    
                    <!-- Judul Halaman (Contoh) -->
                    <h1 class="text-xl font-semibold text-gray-800 ml-3">
                        Student Portal
                    </h1>
                </div>
            </header>

            <!-- [RESPONSIVE] Membungkus $slot dengan div baru untuk padding -->
            <div class="p-6">
                {{ $slot }}
            </div>
<div class="px-6 pb-6">
                 <x-app-footer />
            </div>
        </main>
        
    </div>
    
    @push('scripts')
<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const arrow = document.getElementById("arrow-" + id);

        if (!dropdown) return;

        // Tutup dropdown lain yang mungkin terbuka
        document.querySelectorAll('[id$="Dropdown"]').forEach(el => {
            if (el.id !== id && !el.classList.contains('hidden')) {
                el.classList.add('hidden');
                const otherArrow = document.getElementById("arrow-" + el.id);
                if (otherArrow) {
                    otherArrow.classList.remove('rotate-180');
                }
            }
        });

        // Toggle dropdown saat ini
        dropdown.classList.toggle("hidden");

        if (arrow) {
            arrow.classList.toggle("rotate-180");
        }
    }
</script>
@endpush

    @stack('scripts')


</body>
</html>