<x-app-layout>
    {{-- Memanfaatkan slot header Breeze untuk Judul Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-book mr-3"></i>
            Materials & E-Book
        </h2>
    </x-slot>

    {{-- Container Utama Konten --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Container E-Book (Diubah agar sesuai styling Tailwind/Breeze) --}}

                    {{-- --- Header Form E-Book --- --}}
                    <div class="form-header bg-indigo-700 text-white p-4 rounded-t-lg flex justify-between items-center" id="ebook-header">
                        E-Book
                        <div class="header-icons">
                            {{-- Gunakan x-icon component jika sudah ada, atau inline icon --}}
                            <i class="fas fa-chevron-down mr-3 cursor-pointer" onclick="toggleForm()"></i> 
                            <i class="fas fa-times cursor-pointer" onclick="removeForm()"></i>
                        </div>
                    </div>

                    {{-- --- Konten Form dan Hasil Pencarian --- --}}
                    <div class="content-box p-6 border-x border-b rounded-b-lg border-gray-200">
                        
                        <div id="ebook-search-form" class="mb-5"> 
                            <div class="form-row flex flex-wrap gap-4">
                                <div class="form-group flex-1 min-w-[200px]">
                                    {{-- Gunakan class Breeze untuk input/select, atau tambahkan styling yang kamu butuhkan --}}
                                    <select class="form-control w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option>2 Semesters</option>
                                        <option>1 Semester</option>
                                        <option>3 Semesters</option>
                                    </select>
                                </div>

                                <div class="form-group flex-1 min-w-[200px]">
                                    <select class="form-control w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option>General English 2</option>
                                        <option>System Design Analyst</option>
                                        <option>Mobile Programming</option>
                                    </select>
                                </div>
                            </div>
                            
                            {{-- Tombol Search/Ganti --}}
                            <button class="search-button bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md mt-4 transition duration-150" onclick="showEbookList()">
                                <i class="fas fa-search mr-2"></i> Search
                            </button>
                        </div> 
                        
                        {{-- --- Daftar E-Book (Hasil Pencarian) --- --}}
                        <div id="ebook-list" class="ebook-list-container hidden flex-col gap-4 mt-6 pt-6 border-t border-gray-200">
                            
                            @foreach([
                                ['title' => 'E-Book: General English 2', 'desc' => 'Materi Grammar dan Conversation | 2.5 MB', 'url' => 'https://your-server.com/files/general_english_2.pdf'],
                                ['title' => 'E-Book: Advanced Syntax', 'desc' => 'Kumpulan Contoh Teks Akademik | 1.8 MB', 'url' => 'https://your-server.com/files/advanced_syntax.pdf'],
                                ['title' => 'E-Book: Introduction to Mobile', 'desc' => 'Pengenalan Dasar Flutter | 4.1 MB', 'url' => 'https://your-server.com/files/intro_mobile.pdf']
                            ] as $ebook)
                                <div class="ebook-item flex items-center p-4 border border-gray-200 rounded-lg bg-gray-50">
                                    <div class="ebook-icon text-indigo-500 text-2xl mr-4"><i class="fas fa-book-reader"></i></div>
                                    <div class="ebook-details flex-grow">
                                        <h4 class="m-0 font-semibold text-base text-indigo-700">{{ $ebook['title'] }}</h4>
                                        <p class="m-0 text-sm text-gray-500">{{ $ebook['desc'] }}</p>
                                    </div>
                                    <button class="download-button bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-md transition duration-150" 
                                            onclick="downloadEbook(this)" 
                                            data-ebook-name="{{ $ebook['title'] }}"
                                            data-download-url="{{ $ebook['url'] }}">
                                        <i class="fas fa-download"></i> DOWNLOAD
                                    </button>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Menambahkan JavaScript di bagian akhir body untuk Breeze --}}
    @push('scripts')
    <script>
        const ebookList = document.getElementById('ebook-list');
        const contentBox = document.querySelector('.content-box');
        
        // FUNGSI 1: MENAMPILKAN LIST EBOOK
        function showEbookList() {
            // Menghapus class 'hidden' dari Tailwind
            ebookList.classList.remove('hidden'); 
            ebookList.classList.add('flex'); // Pastikan menggunakan display flex
            
            // Opsional: Scroll ke daftar ebook
            ebookList.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // FUNGSI 2: DOWNLOAD EBOOK (Menggunakan data attribute dari Blade)
        function downloadEbook(buttonElement) {
            const downloadUrl = buttonElement.getAttribute('data-download-url');
            // Mengambil nama dari H4 dalam elemen ebook-item terdekat
            const ebookName = buttonElement.closest('.ebook-item').querySelector('h4').textContent; 

            if (!downloadUrl || downloadUrl.includes('your-server.com')) { // Menambah cek dummy URL
                alert('Error: Link unduhan tidak valid. Harap atur URL unduhan yang benar.');
                return;
            }
            
            const confirmed = confirm(`Anda yakin ingin mengunduh E-Book: "${ebookName}"?`);
            
            if (confirmed) {
                // Memicu unduhan
                const link = document.createElement('a');
                link.href = downloadUrl;
                // Membersihkan nama untuk nama file
                link.setAttribute('download', ebookName.replace(/[^a-z0-9\s-]/gi, '').replace(/\s/g, '_') + '.pdf'); 
                link.style.display = 'none';
                
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }

        // FUNGSI 3: TOGGLE (MINIMIZE/MAXIMIZE)
        function toggleForm() {
            const contentBox = document.querySelector('.content-box');
            // Kita akan menyembunyikan/menampilkan semua konten di bawah header
            contentBox.classList.toggle('hidden'); 
            const icon = document.querySelector('.fa-chevron-down');
            icon.classList.toggle('fa-chevron-up'); // Ganti ikon panah
            icon.classList.toggle('fa-chevron-down');
        }

        // FUNGSI 4: REMOVE (HAPUS WIDGET)
        function removeForm() {
            // Hapus seluruh container yang berisi form dan list
            document.querySelector('.bg-white.overflow-hidden.shadow-sm.sm\\:rounded-lg').style.display = 'none';
        }

        // Menambahkan fungsi toggle dan remove ke window agar bisa dipanggil dari HTML
        window.toggleForm = toggleForm;
        window.removeForm = removeForm;
        window.showEbookList = showEbookList;
        window.downloadEbook = downloadEbook;
    </script>
    @endpush
</x-app-layout>