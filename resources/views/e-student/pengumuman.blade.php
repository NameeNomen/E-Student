<head>
    <meta charset="utf-8">
    {{-- ... tag meta lainnya ... --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
   

    {{-- TAMBAHAN: Jangan lupa panggil Font Awesome dan Chart.js CDN jika belum --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>

<x-app-layout>
    
    {{-- Slot Header Breeze untuk Judul Halaman --}}
    <x-slot name="header">
        
    </x-slot>

    {{-- Main Content Container --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> 
            <div class="flex items-center bg-white p-4 sm:rounded shadow-gray-400">
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
            stroke="red"
            stroke-linecap="round" 
            stroke-linejoin="round"
            class="w-10 h-10"
        >
            <!-- garis menu -->
            <path d="M7.5 6 H15.5" />
            <path d="M7.5 10 H12.5" />
            <path d="M7.5 14 H15.5" />

            <!-- bullet -->
            <circle cx="4.5" cy="6" r="1" fill="red" />
            <circle cx="4.5" cy="10" r="1" fill="red" />
            <circle cx="4.5" cy="14" r="1" fill="red" />
        </svg>
    </template>

    <!-- ICON KETIKA SIDEBAR TERBUKA (ARROW LEFT) -->
    <template x-if="isSidebarOpen">
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="red"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-10 h-10"
        >
            <path d="M15 6 L9 12 L15 18" />
        </svg>
    </template>

</button>


             <h1 class="text-2xl font-semibold text-red-600 leading-tight flex items-center gap-3">
            <i class="fas fa-bullhorn header-icon text-3xl"></i>
            {{ __('Announcement') }}
        </h1></div><br>            

             {{-- Mengurangi max-width agar sesuai konten --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="announcement-box relative p-10 sm:p-12 border border-gray-200 rounded-xl text-center shadow-md mt-4">
                    
                    {{-- --- Tombol ANNOUNCEMENT INFORMATION (Pita) --- --}}
                    <button class="info-button bg-red-600 text-white p-2 px-4 text-xs sm:text-sm font-semibold uppercase absolute top-0 right-0 hover:bg-red-700 transition duration-200" 
                            onclick="alert('Membuka halaman informasi pengumuman.')">
                        ANNOUNCEMENT INFORMATION
                    </button>
                    
                    {{-- Ikon/Gambar Utama --}}
                    <div class="chat-icon mb-5">
                        {{-- Pastikan gambar ini ada di public/gambar/ --}}
                        <img src="{{ asset('gambar/Mobile Marketing-rafiki.svg') }}" alt="Announcement Image" class="mx-auto w-[300px] max-w-full">
                    </div>
                    
                    {{-- Pesan Pengumuman --}}
                    <div class="message text-lg text-gray-600 font-medium">
                        Sorry, there are no announcements at this time.
                    </div>
                    
                    {{-- Jika ada pengumuman:
                    <div class="announcement-content text-left mt-8">
                        <h2 class="text-2xl font-bold text-red-600">Pengumuman Terbaru: Ujian Tengah Semester</h2>
                        <p class="text-gray-700 mt-2">Diumumkan kepada seluruh mahasiswa, Ujian Tengah Semester akan dilaksanakan pada 
                            tanggal 15-20 November 2025. Harap segera melunasi pembayaran SPP.
                        </p>
                        <p class="text-sm text-gray-500 mt-4">Posted: 01 November 2025</p>
                    </div>
                    --}}
                    
                </div>
            </div>
        </div>
    </div>
    
    {{-- Memasukkan CSS Kustom untuk efek Pita --}}
    @push('styles')
    <style>
        /* CSS unik untuk membuat ujung tombol seperti pita menggunakan clip-path */
        .info-button {
            /* Bentuk Pita/Tag dengan CSS Shapes */
            clip-path: polygon(0 0, 100% 0, 100% 100%, 10% 100%, 0 80%);
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
    @endpush
    
    {{-- Menambahkan JavaScript --}}
    @push('scripts')
    {{-- Tambahkan skrip jika kamu ingin memuat pengumuman secara dinamis --}}
    @endpush
</x-app-layout>