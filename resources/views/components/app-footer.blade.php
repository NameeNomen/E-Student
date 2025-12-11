@php
    // Variabel warna untuk konsistensi (Opsional, tapi bagus untuk keterbacaan)
    $primaryColor = '#004269';
    $accentColor = '#009DA5';
@endphp

{{-- 
Footer yang modern:
- Background putih bersih (bg-white).
- Sudut membulat (rounded-xl) dan shadow (shadow-lg) agar terlihat seperti card.
- Pola SVG diterapkan di background dengan opacity rendah.
--}}
<footer class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 relative overflow-hidden mt-6">
    
    {{-- START: Pola SVG Estetik --}}
    <div class="absolute inset-0 pointer-events-none z-0">
        {{-- Memanggil SVG Pattern yang disimpan di public/images/dashboard-pattern.svg --}}
        <div 
            class="w-full h-full" 
            style="background-image: url('{{ asset('images/dashboard-pattern.svg') }}'); background-repeat: repeat; opacity: 0.2;"
        ></div>
    </div>
    {{-- END: Pola SVG Estetik --}}

    <div class="relative z-10">
        {{-- Versi & Nama Aplikasi --}}
        <p class="text-sm font-semibold text-gray-700 mb-1">
            ✨ E-Student <span class="text-{{ $accentColor == '#009DA5' ? 'accent' : 'teal-500' }}">version 4.0</span>
        </p>

        {{-- Hak Cipta & Tahun (Update ke 2025) --}}
        <p class="text-xs text-gray-500">
            Copyright © 2016 - **2025** | Developed by ICT@LPBI
        </p>
    </div>
</footer>