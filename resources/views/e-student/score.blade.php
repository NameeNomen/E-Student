@extends('layouts.app')

@section('content')
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="space-y-8">

            {{-- ========================================== --}}
            {{-- BAGIAN 1: SUMMARY (TEAL CARD) --}}
            {{-- Penekanan pada bentuk tebal --}}
            {{-- ========================================== --}}
            <div x-data="{ summaryOpen: true }" class="rounded-2xl shadow-lg overflow-hidden border border-gray-100 bg-white">
                <button type="button" 
                        @click="summaryOpen = !summaryOpen" 
                        class="relative w-full text-left p-6 sm:p-8 {{ $summary['bg_color'] }} focus:outline-none transition-colors group cursor-pointer">
                    
                    {{-- POLA GEOMETRIC (OPACITY Disesuaikan) --}}
                    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-50"> {{-- Opacity total dikurangi sedikit --}}
                        
                        {{-- GARIS TIPIS (DIAGONAL) --}}
                        <div class="absolute right-[20%] -top-[50%] w-6 h-[200%] bg-white transform rotate-45 shadow-lg z-10 opacity-10"></div>
                        
                        {{-- BENTUK TEBAL (Besar Kanan Bawah) --}}
                        <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-white rounded-full opacity-60"></div>
                        
                        {{-- BENTUK TEBAL (Kecil Kiri Bawah) --}}
                        <div class="absolute bottom-4 left-4 w-12 h-12 bg-white rounded-full opacity-30"></div>
                        
                        {{-- BENTUK (Tengah Penghubung) --}}
                        <div class="absolute bottom-4 left-4 w-40 h-20 bg-white rounded-full opacity-20 transform -rotate-12"></div>
                    </div>

                    <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-center gap-5">
                            <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm shadow-inner">
                                {!! $summary['icon'] !!}
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white tracking-wide">{{ $summary['title'] }}</h3>
                                <p class="text-teal-50 text-sm font-medium mt-1">{{ $summary['subtitle'] }}</p>
                            </div>
                        </div>
                        
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center transition-transform duration-300"
                             :class="summaryOpen ? 'rotate-180 bg-white/30' : ''">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </button>

                <div x-show="summaryOpen" x-collapse class="bg-white">
                    <div class="p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="text-gray-600 max-w-lg">
                            <p>Lihat detail lengkap mengenai Indeks Prestasi (IP), IPK, dan transkrip nilai akademik Anda secara keseluruhan.</p>
                        </div>
                        
                        <a href="{{ route('score', ['type' => 'academic-profile']) }}" 
                           class="w-full md:w-auto px-8 py-3 rounded-xl font-bold shadow-lg transform transition hover:scale-105 hover:shadow-xl text-center {{ $summary['btn_color'] }}">
                            Lihat Profile Lengkap
                        </a>
                    </div>
                </div>
            </div>


            {{-- ========================================== --}}
            {{-- BAGIAN 2: GRID (COMPONENT & KHS CARDS) --}}
            {{-- Penekanan pada bentuk tebal --}}
            {{-- ========================================== --}}
            
            <div class="space-y-6"> 
                @foreach ($gridData as $report)
                    <div x-data="{ open_{{ $report['id'] }}: false }" 
                         class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 flex flex-col hover:shadow-xl transition-shadow duration-300">
                        
                        <button type="button" 
                                @click="open_{{ $report['id'] }} = !open_{{ $report['id'] }}" 
                                class="relative w-full text-left p-6 {{ $report['bg_color'] }} focus:outline-none cursor-pointer">
                            
                            {{-- POLA GEOMETRIC (OPACITY Disesuaikan) --}}
                            <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-50">
                                
                                {{-- GARIS TIPIS (DIAGONAL) --}}
                                <div class="absolute right-[20%] -top-[50%] w-6 h-[200%] bg-white transform rotate-45 shadow-lg z-10 opacity-10"></div>
                                
                                {{-- BENTUK TEBAL (Kotak Besar Miring) --}}
                                <div class="absolute -right-[10%] top-[10%] w-20 h-20 bg-white rounded-xl transform rotate-45 opacity-40"></div>
                                
                                {{-- BENTUK TEBAL (Kotak Kecil Outline) --}}
                                <div class="absolute right-[18%] bottom-[10%] w-14 h-14 border-2 border-white/20 rounded-lg transform rotate-12 z-10 opacity-30"></div>
                                
                                {{-- Floating Square Kecil --}}
                                <div class="absolute right-[5%] -top-[10%] w-6 h-6 bg-white/30 rounded transform rotate-45 z-0"></div>
                            </div>

                            <div class="relative z-10 flex justify-between items-start">
                                <div class="flex items-center gap-4">
                                    <div class="p-2.5 bg-white/20 rounded-xl backdrop-blur-sm shadow-inner">
                                        {!! $report['icon'] !!}
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white leading-tight shadow-black drop-shadow-md pr-2">{{ $report['title'] }}</h3>
                                        <p class="text-white/80 text-xs mt-1 uppercase tracking-wider font-semibold">{{ $report['subtitle'] }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex-shrink-0 p-1.5 rounded-full bg-white/20 transition-transform duration-300"
                                     :class="open_{{ $report['id'] }} ? 'rotate-180 bg-white/30' : ''">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </button>

                        <div x-show="open_{{ report['id'] }}" x-collapse class="bg-gray-50/50 border-t border-gray-100">
                            <div class="p-5 space-y-3">
                                @foreach ($semesters as $semester)
                                    <div class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3 hover:border-gray-300 transition-colors group">
                                        <div class="flex items-center gap-3 w-full sm:w-auto">
                                            <div class="w-1.5 h-1.5 rounded-full {{ $report['bg_color'] }} group-hover:scale-150 transition-transform"></div>
                                            <span class="font-bold text-gray-700 text-sm sm:text-base">{{ $semester }}</span>
                                        </div>
                                        
                                        @php $semNum = explode(' ', $semester)[0]; @endphp

                                        <a href="{{ route('score', ['type' => $report['id'], 'semester' => $semNum]) }}" 
                                           class="w-full sm:w-auto text-center px-4 py-2 rounded-lg text-xs font-bold shadow-sm transition-transform active:scale-95 {{ $report['btn_color'] }}">
                                            Lihat Detail
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="h-1 w-full {{ $report['bg_color'] }} opacity-20"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection