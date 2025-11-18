<x-app-layout>
    
    {{-- Slot Header Breeze untuk Judul Halaman --}}
    <x-slot name="header">
       
    </x-slot>

    {{-- Main Content Container --}}
    {{-- Kita akan menggunakan struktur Breeze standar, lalu menambahkan style kustom di dalamnya --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center bg-green-500 p-4 sm:rounded ">
             {{-- INI TOMBOL TOGGLE-nya --}}
             >


             <h1 class="text-2xl font-extrabold text-white leading-tight">
            {{ __('Menu KRS (Kartu Rencana Studi)') }}
        </h1></div><br>            

            {{-- Mengganti div custom dengan div Breeze standar --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-10 fade-zoom">
                
                {{-- Judul Halaman --}}
                <!-- <div class="text-3xl sm:text-4xl font-extrabold text-gray-800 mb-8 border-b pb-4">
                    {{ __('KRS') }}
                </div> -->

                {{-- Grid Kartu Semester --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    
                    {{-- Data Kartu (Bisa diganti dengan data dari Controller) --}}
                    @php
                        $semesters = [
                            ['num' => 1, 'color_from' => 'from-green-500', 'color_to' => 'to-emerald-500', 'link' => route('krs.menu', 1)],
                            ['num' => 2, 'color_from' => 'from-blue-500', 'color_to' => 'to-indigo-500', 'link' => route('krs.menu', 2)],
                            ['num' => 3, 'color_from' => 'from-amber-400', 'color_to' => 'to-yellow-500', 'link' => route('krs.menu', 3)],
                            ['num' => 4, 'color_from' => 'from-rose-500', 'color_to' => 'to-red-600', 'link' => route('krs.menu', 4)],
                        ];
                    @endphp

                    @foreach ($semesters as $sem)
                        {{-- Kartu Semester --}}
                        <a href="{{ $sem['link'] }}" class="relative group rounded-2xl p-8 h-44 flex flex-col items-center justify-center text-center 
                                                            bg-gradient-to-br {{ $sem['color_from'] }} {{ $sem['color_to'] }} text-white shadow-xl 
                                                            transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl hover:scale-105">
                            
                            {{-- Ikon Bintang --}}
                            <div class="absolute top-4 right-4 bg-yellow-300 rounded-full w-8 h-8 flex items-center justify-center shadow-md group-hover:animate-bounce">
                                ⭐
                            </div>
                            
                            {{-- Nomor Semester --}}
                            <div class="text-5xl font-extrabold mb-2 drop-shadow-lg">{{ $sem['num'] }}</div>
                            <div class="text-lg tracking-widest font-semibold">{{ __('SEMESTER') }}</div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    
    {{-- Memasukkan CSS & Animasi Kustom --}}
    @push('styles')
    <style>
        /* Gaya latar belakang kustom */
        body {
            background: linear-gradient(135deg, #f9fafb, #e0f2fe) !important;
            font-family: 'Poppins', sans-serif !important;
        }

        /* Animasi halus fade-zoom */
        .fade-zoom {
            opacity: 0;
            transform: scale(0.95);
            animation: fadeZoom 0.6s ease forwards;
        }
        @keyframes fadeZoom {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
    @endpush
    
    {{-- Menambahkan JavaScript (tidak ada JS fungsional, hanya placeholder) --}}
    @push('scripts')
    {{-- Skrip yang dibutuhkan bisa ditambahkan di sini --}}
    @endpush
</x-app-layout>