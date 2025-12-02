<x-app-layout>
    <!-- Slot Header (Bagian Judul di Atas) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mata Kuliah') }}
        </h2>
    </x-slot>

    <!-- Konten Utama -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Judul Section di dalam konten -->
            <div class="mb-6 px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Pilih Folder Tugas (Mata Kuliah)</h3>
            </div>

            <!-- Grid Container -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 sm:px-0">

                @foreach($task as $tugas)
                <!-- Card Item -->
                <a href="{{ route('tugas.detail', $tugas['id']) }}"

                class="group block bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-xl 
                transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
                    
                    <!-- Bagian Gambar (Thumbnail Folder) -->
                    <div class="relative h-48 w-full overflow-hidden bg-gray-200">
                        <!-- Gambar dari folder public/img/ -->
                        <img src="{{ asset('gambar/' . $tugas['image']) }}" 
                             alt="{{ $tugas['title'] }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                             onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">
                        
                        <!-- Overlay Gelap Halus Saat Hover -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                    </div>

                    <!-- Bagian Keterangan -->
                    <div class="p-6">
                        <!-- Judul Mata Kuliah -->
                        <h2 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-2 mb-2">
                            {{ $tugas['title'] }}
                        </h2>
                        
                        <div class="flex items-center justify-between mt-4">
                            <!-- Badge Status Tugas -->
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $tugas['assignments_count'] > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $tugas['assignments_count'] }} Tugas {{ $tugas['status'] }}
                            </span>

                            <!-- Icon Panah -->
                            <div class="{{ $tugas['color'] ?? 'text-indigo-500' }} transform transition-transform group-hover:translate-x-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>