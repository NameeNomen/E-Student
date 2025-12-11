<x-app-layout>
    <div class="min-h-screen bg-[#F4F7FE] font-sans py-8">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div class="relative w-full md:w-1/3">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                    <input type="text" class="block w-full pl-10 pr-3 py-3 border-none rounded-2xl leading-5 bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004269] shadow-sm sm:text-sm" placeholder="Cari mata kuliah...">
                </div>

                <h2 class="text-2xl font-bold text-[#004269]">
                    Dashboard Tugas
                </h2>
            </div>

            <div class="bg-[#004269] rounded-3xl p-6 md:p-10 mb-10 shadow-lg relative overflow-hidden text-white flex items-center justify-between">
                <div class="relative z-10 max-w-lg">
                    <h1 class="text-3xl font-bold mb-2">Halo, Mahasiswa!</h1>
                    <p class="text-blue-100 text-sm md:text-base opacity-90">
                        Kamu punya tugas yang harus diselesaikan. Tetap semangat dan cek deadline tugasmu di bawah ini.
                    </p>
                </div>
                
                <div class="absolute right-0 top-0 h-64 w-64 bg-white opacity-10 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute right-20 bottom-0 h-32 w-32 bg-teal-400 opacity-20 rounded-full blur-2xl"></div>
            </div>

            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-[#004269]">Daftar Mata Kuliah</h3>
                <span class="text-sm text-gray-500 cursor-pointer hover:text-[#004269]">Lihat Semua</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($task as $tugas)
                <a href="{{ route('tugas.detail', $tugas['id']) }}" 
                   class="group bg-white rounded-3xl p-5 shadow-sm hover:shadow-xl transition-all duration-300 border border-transparent hover:border-[#004269]/20 transform hover:-translate-y-1 flex flex-col h-full relative overflow-hidden">
                    
                    <div class="flex justify-between items-start mb-4">
                        <div class="h-16 w-16 rounded-2xl bg-[#F4F7FE] flex items-center justify-center group-hover:bg-[#004269]/10 transition-colors duration-300">
                            <div class="transform scale-75 group-hover:scale-90 transition-transform duration-300">
                                {!! $tugas['image'] !!}
                            </div>
                        </div>

                        @if($tugas['assignments_count'] > 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-600">
                                {{ $tugas['assignments_count'] }} Tugas
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-600">
                                Selesai
                            </span>
                        @endif
                    </div>

                    <div class="mt-2 flex-1">
                        <h4 class="text-lg font-bold text-[#004269] mb-1 line-clamp-2 leading-tight group-hover:text-[#006599] transition-colors">
                            {{ $tugas['title'] }}
                        </h4>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">
                            Semester 3
                        </p>
                    </div>

                    <div class="mt-6 flex items-center justify-between border-t border-gray-100 pt-4">
                        <div class="text-sm text-gray-500 font-medium">
                            {{ $tugas['status'] }}
                        </div>
                        
                        <div class="h-10 w-10 rounded-full bg-[#F4F7FE] flex items-center justify-center text-[#004269] group-hover:bg-[#004269] group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>