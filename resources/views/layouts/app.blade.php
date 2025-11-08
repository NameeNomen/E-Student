<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body{
            font-family:"poppins";
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100"  x-data="{ isSidebarOpen: false }">

    {{-- KONTROL UTAMA ALPINE.JS --}}
    <div x-data="{ isSidebarOpen: true }" class="min-h-screen">
        
        {{-- 1. SIDEBAR (Fixed & Controlled) --}}
        <aside x-bind:class="{ '-translate-x-full': !isSidebarOpen }" 
            class="w-64 bg-[#4b2aad] text-white min-h-screen shadow-2xl fixed left-0 top-0 z-30 transform transition-transform duration-300"> 

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
        <main :class="{ 'ml-64': isSidebarOpen }" class="pt-6 transition-all duration-300">
            {{ $slot }}
        </main>
    </div>
    @push('scripts')
<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const arrow = document.getElementById("arrow-" + id);

        if (!dropdown) return;

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