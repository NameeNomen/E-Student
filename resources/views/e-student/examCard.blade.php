<x-app-layout>
    
    {{-- Slot Header Breeze untuk Judul Halaman --}}
    <x-slot name="header">
        
    </x-slot>

    {{-- Main Content Container --}}
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
<div class="flex items-center bg-[#FCD34D] p-4 sm:rounded ">
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
            stroke="black"
            stroke-linecap="round" 
            stroke-linejoin="round"
            class="w-10 h-10"
        >
            <!-- garis menu -->
            <path d="M7.5 6 H15.5" />
            <path d="M7.5 10 H12.5" />
            <path d="M7.5 14 H15.5" />

            <!-- bullet -->
            <circle cx="4.5" cy="6" r="1" fill="black" />
            <circle cx="4.5" cy="10" r="1" fill="black" />
            <circle cx="4.5" cy="14" r="1" fill="black" />
        </svg>
    </template>

    <!-- ICON KETIKA SIDEBAR TERBUKA (ARROW LEFT) -->
    <template x-if="isSidebarOpen">
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="black"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-10 h-10"
        >
            <path d="M15 6 L9 12 L15 18" />
        </svg>
    </template>

</button>


             <h1 class="font-semibold text-xl text-black leading-tight">
            <i class="fas fa-file-alt mr-3"></i> 
            {{ __('Exam Card') }}
        </h1>   
</div><br>            
                {{-- Wrapper Kartu Ujian (menggantikan .exam-cards-wrapper) --}}
                <div class="flex flex-wrap justify-center gap-6">

                    {{-- --- Kartu 1: Mid Semester Exam --- --}}
                    <div class="exam-card relative bg-indigo-500 rounded-xl shadow-lg p-8 w-full max-w-sm text-center text-white cursor-pointer transition duration-300 hover:scale-[1.01] hover:shadow-2xl overflow-hidden">
                        
                        {{-- Bookmark Detail Kuning (Membutuhkan CSS kustom di bawah) --}}
                        <div class="bookmark">
                            <i class="fas fa-star star-icon"></i> 
                        </div>

                        <div class="title text-xl font-bold leading-tight">
                            {{-- URL harus menggunakan route() Laravel --}}
                            <a href="{{ url('MidExam.html') }}" class="block">
                                {{-- Jika gambar disimpan di folder public/gambar --}}
                                <img src="{{ asset('gambar/college entrance exam-pana.svg') }}" alt="Mid Exam Icon" class="mx-auto mb-4 w-[250px]">
                            </a>
                            Mid Semester Exam
                        </div>
                    </div>

                    {{-- --- Kartu 2: End Semester Exam --- --}}
                    <div class="exam-card relative bg-indigo-500 rounded-xl shadow-lg p-8 w-full max-w-sm text-center text-white cursor-pointer transition duration-300 hover:scale-[1.01] hover:shadow-2xl overflow-hidden">
                        
                        <div class="bookmark">
                            <i class="fas fa-star star-icon"></i>
                        </div>
                        
                        <div class="title text-xl font-bold leading-tight">
                            <a href="{{ url('EndExam.html') }}" class="block">
                                <img src="{{ asset('gambar/college entrance exam-amico.svg') }}" alt="End Exam Icon" class="mx-auto mb-4 w-[250px]">
                            </a>
                            End Semester Exam
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Penyesuaian Style Kustom (Bookmark) --}}
    {{-- Ini harus dimasukkan di layout utama atau menggunakan class Breeze / Vite --}}
    @push('styles')
    <style>
        /* Styling untuk Bookmark Kuning */
        .bookmark {
            position: absolute;
            top: -1px; 
            right: 25px; 
            width: 50px; 
            height: 60px; 
            background-color: #fde047; /* Bookmark Kuning Cerah */
            box-shadow: -2px 2px 3px rgba(0,0,0,0.2); 
            z-index: 10;
        }

        .bookmark::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 15px 25px 0 25px; 
            border-color: #fde047 transparent transparent transparent; 
            transform: translateY(100%); 
            transform-origin: top; 
        }
        
        .bookmark::after {
            content: '';
            position: absolute;
            top: 5px; 
            left: 5px; 
            width: 40px; 
            height: 50px; 
            border: 1px dashed #fff; /* Garis putus-putus putih */
            border-radius: 3px; 
        }

        /* Styling untuk Ikon Bintang FA */
        .star-icon {
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            color: white; /* Warna bintang putih */
            font-size: 18px; 
            z-index: 11;
        }
    </style>
    @endpush
</x-app-layout>