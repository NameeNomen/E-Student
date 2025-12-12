<x-app-layout>
    {{-- Style Font & Animasi --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .fade-in { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Animasi Floating Halus untuk Pola Background */
        .animate-float-slow { animation: floatSlow 10s ease-in-out infinite alternate; }
        @keyframes floatSlow {
            0% { transform: translateY(0px) translateX(0px); }
            100% { transform: translateY(-20px) translateX(10px); }
        }
    </style>

    {{-- ==================================================================== --}}
    {{-- 1. BACKGROUND DECORATIVE (HEADER BIRU PANJANG UTAMA) --}}
    {{-- ==================================================================== --}}
    <div class="fixed inset-0 -z-10 bg-[#F8FAFC] overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-[350px] bg-[#004269] relative overflow-hidden">
            
            {{-- >>> POLA HEXAGON TECH NETWORK KOMPLEKS (SESUAI CONTOH) <<< --}}
            <div class="absolute top-[-20%] right-[-10%] w-[1000px] h-[600px] pointer-events-none animate-float-slow" style="opacity: 0.15;">
                <svg viewBox="0 0 800 600" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                    <g stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none">
                        
                        {{-- CLUSTER UTAMA (KANAN ATAS) --}}
                        <g transform="translate(400, 50)">
                            {{-- Hexagon Outline Besar --}}
                            <path d="M150 0 L225 43.3 V129.9 L150 173.2 L75 129.9 V43.3 Z" opacity="0.8"/>
                            {{-- Hexagon Solid Biru Tua --}}
                            <path d="M225 43.3 L280 75 V138 L225 170 L170 138 V75 Z" fill="#004269" stroke="none" opacity="0.6"/>
                            {{-- Garis & Dot Penghubung --}}
                            <path d="M75 43.3 L40 20 M75 129.9 L40 150" opacity="0.6"/>
                            <circle cx="40" cy="20" r="4" fill="#ffffff" stroke="none"/>
                            <circle cx="40" cy="150" r="4" fill="#ffffff" stroke="none"/>
                            
                            {{-- Sub-cluster Bawah --}}
                            <g transform="translate(-50, 180)">
                                <path d="M100 0 L150 28.9 V86.6 L100 115.5 L50 86.6 V28.9 Z" opacity="0.7"/>
                                <path d="M50 86.6 L0 115.5 V173.2 L50 202.1 L100 173.2 V115.5 Z" fill="#009DA5" stroke="none" opacity="0.4"/>
                                <path d="M150 86.6 L180 104" opacity="0.6"/> <circle cx="180" cy="104" r="3" fill="#ffffff" stroke="none"/>
                            </g>
                        </g>

                        {{-- CLUSTER KEDUA (TENGAH KIRI) --}}
                        <g transform="translate(100, 200) scale(0.8)">
                             {{-- Hexagon Solid Teal --}}
                            <path d="M100 0 L150 28.9 V86.6 L100 115.5 L50 86.6 V28.9 Z" fill="#009DA5" stroke="none" opacity="0.5"/>
                            {{-- Hexagon Outline --}}
                            <path d="M150 28.9 L200 57.7 V115.5 L150 144.3 L100 115.5 V57.7 Z" opacity="0.7"/>
                            {{-- Circuit Lines --}}
                            <path d="M50 28.9 L20 10 M50 86.6 L20 105" opacity="0.5"/>
                            <circle cx="20" cy="10" r="4" fill="#ffffff" stroke="none" opacity="0.8"/>
                            
                             {{-- Parallel Lines --}}
                            <path d="M200 57.7 L240 57.7 M200 77.7 L230 77.7" opacity="0.5"/>
                            <circle cx="240" cy="57.7" r="3" fill="#ffffff" stroke="none"/>
                            <circle cx="230" cy="77.7" r="3" fill="#ffffff" stroke="none"/>
                        </g>
                        
                        {{-- ELEMEN MENYEBAR (KESAN JARINGAN) --}}
                        <g opacity="0.4">
                            <path d="M600 300 L650 328.9 V386.6 L600 415.5 L550 386.6 V328.9 Z" /> {{-- Outline Bawah --}}
                            <path d="M50 50 L80 67.3 V102 L50 119.3 L20 102 V67.3 Z" fill="#004269" stroke="none" opacity="0.3"/> {{-- Solid Kecil Kiri Atas --}}
                            <path d="M700 100 L750 100" /> <circle cx="750" cy="100" r="3" fill="#ffffff" stroke="none"/> {{-- Garis Jauh --}}
                        </g>

                    </g>
                </svg>
            </div>
            {{-- ======================================================== --}}

            {{-- Gradient Blobs & Dots (Tetap Ada untuk Kedalaman) --}}
            <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-[#009DA5] opacity-20 rounded-full blur-[100px] mix-blend-overlay"></div>
            <div class="absolute top-[20%] right-[-5%] w-[300px] h-[300px] bg-[#F15B67] opacity-20 rounded-full blur-[80px] mix-blend-overlay"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
        </div>
    </div>

    {{-- INIT ALPINE JS --}}
    <div class="py-10 px-4 sm:px-6 lg:px-8 relative" x-data="{ isEditing: false, activeTab: 'biodata' }">
        
        {{-- Flash Message Success --}}
        @if(session('success'))
        <div class="max-w-6xl mx-auto mb-6 bg-emerald-500 text-white p-4 rounded-xl shadow-lg fade-in flex justify-between items-center" x-data="{ show: true }" x-show="show">
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-xl"></i>
                <span class="font-bold">{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="hover:bg-white/20 p-2 rounded-full transition"><i class="fas fa-times"></i></button>
        </div>
        @endif

        {{-- Header Navigation --}}
        <div class="max-w-6xl mx-auto mb-6 flex justify-between items-center text-white relative z-10">
            <button onclick="history.back()" class="flex items-center gap-2 hover:bg-white/10 px-4 py-2 rounded-full transition backdrop-blur-sm group">
                <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-[#F15B67] transition">
                    <i class="fas fa-arrow-left text-xs"></i>
                </div>
                <span class="font-medium text-sm">Kembali ke Dashboard</span>
            </button>
            <div class="hidden md:block font-bold tracking-widest uppercase text-xs opacity-70">Sistem Informasi Akademik</div>
        </div>

        {{-- Form Wrapper --}}
        <form action="{{ route('lihatProfile.store') }}" method="POST">
            @csrf
            
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                {{-- LEFT COLUMN: Profile Card (Sticky) --}}
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden relative border border-slate-100 sticky top-6">
                        
                        {{-- ================================================= --}}
                        {{-- 2. HEADER KARTU PROFIL (POLA KECIL - DISEDERHANAKAN) --}}
                        {{-- ================================================= --}}
                        <div class="h-32 bg-gradient-to-r from-[#009DA5] to-[#004269] relative overflow-hidden">
                            
                            {{-- POLA SVG DI KARTU (Versi lebih simpel dari header utama) --}}
                            <div class="absolute top-0 right-0 w-full h-full pointer-events-none overflow-hidden">
                                <svg class="absolute top-[-10%] right-[-10%] h-[140%] w-auto text-white/20 animate-float-slow" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <g stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M200 50 L250 78.9 V136.6 L200 165.5 L150 136.6 V78.9 Z" fill="none" opacity="0.5"/>
                                        <path d="M150 136.6 L100 165.5 V223.2 L150 252.1 L200 223.2 V165.5 Z" fill="currentColor" stroke="none" opacity="0.2"/>
                                        <path d="M250 78.9 L280 60" opacity="0.6"/> <circle cx="280" cy="60" r="3" fill="currentColor" stroke="none"/>
                                        <path d="M100 165.5 L70 180" opacity="0.6"/> <circle cx="70" cy="180" r="3" fill="currentColor" stroke="none"/>
                                    </g>
                                </svg>
                            </div>
                            
                            {{-- Shadow Bawah --}}
                            <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        {{-- ================================================= --}}

                        <div class="px-6 pb-8 text-center relative">
                            {{-- Photo Section --}}
                            <div class="-mt-16 mb-4 inline-block relative group">
                                <div class="w-32 h-32 rounded-full border-[5px] border-white shadow-lg overflow-hidden bg-slate-100 relative">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Mahasiswa') }}&background=004269&color=fff&size=512" alt="Profile" class="w-full h-full object-cover">
                                </div>
                            </div>

                            <h2 class="text-xl font-bold text-[#004269]">{{ Auth::user()->name ?? 'Nama Mahasiswa' }}</h2>
                            <p class="text-[#009DA5] text-sm font-medium">Teknik Informatika - D3</p>
                            
                            <div class="mt-4 flex justify-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold border border-emerald-100 flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Aktif
                                </span>
                            </div>

                            {{-- Stats --}}
                            <div class="center gap-2 mt-6 pt-6 border-t border-slate-100">
                                <div class="text-center">
                                    <span class="block text-2xl font-extrabold text-[#004269]">3.05</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">IPK Kumulatif</span>
                                </div>
                                <!-- <div class="text-center border-l border-slate-100">
                                    <span class="block text-2xl font-extrabold text-[#004269]">114</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">SKS Lulus</span>
                                </div> -->
                            </div>

                            {{-- Action Button (VIEW MODE) --}}
                            <div class="mt-6" x-show="!isEditing">
                                <button type="button" @click="isEditing = true" class="w-full py-3 rounded-xl bg-[#004269] text-white font-semibold text-sm shadow-lg shadow-blue-900/20 hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-center gap-2">
                                    <i class="fas fa-user-edit"></i> Edit Data Diri
                                </button>
                            </div>
                            
                            {{-- Action Button (EDIT MODE) --}}
                            <div class="mt-6 space-y-3" x-show="isEditing" x-cloak>
                                <button type="submit" class="w-full py-3 rounded-xl bg-[#009DA5] text-white font-semibold text-sm shadow-lg shadow-teal-500/20 hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-center gap-2">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <button type="button" @click="isEditing = false" class="w-full py-3 rounded-xl bg-slate-100 text-slate-600 font-semibold text-sm hover:bg-slate-200 transition">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: Detailed Info & Tabs --}}
                <div class="lg:col-span-8 space-y-6">
                    
                    {{-- ================= VIEW MODE SECTION ================= --}}
                    <div x-show="!isEditing" class="fade-in">
                        
                        {{-- Tabs Navigation --}}
                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-2 shadow-sm border border-slate-100 flex gap-2 overflow-x-auto sticky top-6 z-20 mb-6">
                            <button type="button" @click="activeTab = 'biodata'" :class="activeTab === 'biodata' ? 'bg-[#009DA5] text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'" class="flex-1 py-3 px-4 rounded-xl font-bold text-sm transition">Biodata Diri</button>
                            <button type="button" @click="activeTab = 'alamat'" :class="activeTab === 'alamat' ? 'bg-[#009DA5] text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'" class="flex-1 py-3 px-4 rounded-xl font-medium text-sm transition">Data Alamat</button>
                            <button type="button" @click="activeTab = 'kontak'" :class="activeTab === 'kontak' ? 'bg-[#009DA5] text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'" class="flex-1 py-3 px-4 rounded-xl font-medium text-sm transition">Kontak</button>
                        </div>

                        {{-- TAB 1: BIODATA DIRI --}}
                        <div x-show="activeTab === 'biodata'" class="fade-in">
                            <div class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-slate-100 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-[#009DA5] opacity-5 rounded-bl-full pointer-events-none"></div>
                                <h3 class="text-xl font-bold text-[#004269] mb-6 flex items-center gap-2"><span class="w-2 h-6 bg-[#F15B67] rounded-full"></span> Informasi Pribadi</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">NIM</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="far fa-id-badge text-[#009DA5]"></i><span class="text-slate-700 font-bold">2021004012</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">Email</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="far fa-envelope text-[#009DA5]"></i><span class="text-slate-700 font-bold truncate">{{ Auth::user()->email ?? 'mahasiswa@lp3i.ac.id' }}</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">TTL</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="far fa-calendar-alt text-[#009DA5]"></i><span class="text-slate-700 font-bold">Jakarta, 12 Agustus 2003</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">Gender</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="fas fa-venus-mars text-[#009DA5]"></i><span class="text-slate-700 font-bold">Laki-laki</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">Agama</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="fas fa-pray text-[#009DA5]"></i><span class="text-slate-700 font-bold">Islam</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">No. Telp</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="fas fa-phone text-[#009DA5]"></i><span class="text-slate-700 font-bold">{{ session('dummy_phone', '+62 812 3456 7890') }}</span></div></div>
                                </div>
                            </div>
                        </div>

                        {{-- TAB 2: ALAMAT --}}
                        <div x-show="activeTab === 'alamat'" class="fade-in">
                            <div class="space-y-4">
                                <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-slate-100 flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-[#004269] flex items-center justify-center text-white shrink-0"><i class="fas fa-id-card"></i></div>
                                    <div><h4 class="text-sm font-bold text-[#004269] uppercase mb-1">Alamat Asli (KTP)</h4><p class="text-slate-600 text-sm">Jl. Merdeka Selatan No. 45, RT.01/RW.02, Kel. Gambir, Kec. Gambir, Jakarta Pusat 10110</p></div>
                                </div>
                                <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-slate-100 flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-[#009DA5] flex items-center justify-center text-white shrink-0"><i class="fas fa-map-marker-alt"></i></div>
                                    <div><h4 class="text-sm font-bold text-[#009DA5] uppercase mb-1">Alamat Domisili</h4><p class="text-slate-600 text-sm">{{ session('dummy_domisili', 'Kost Griya Sejahtera, Jl. Kramat Raya No. 128, Kamar 204, Senen, Jakarta Pusat 10430') }}</p></div>
                                </div>
                            </div>
                        </div>

                        {{-- TAB 3: KONTAK --}}
                        <div x-show="activeTab === 'kontak'" class="fade-in">
                            <div class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-slate-100">
                                <h3 class="text-xl font-bold text-[#004269] mb-6 flex items-center gap-2"><span class="w-2 h-6 bg-[#F15B67] rounded-full"></span> Kontak Darurat</h3>
                                <div class="space-y-6">
                                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                        <div class="w-14 h-14 rounded-full bg-[#F15B67]/10 flex items-center justify-center text-[#F15B67] shrink-0"><i class="fas fa-user-friends text-xl"></i></div>
                                        <div class="flex-1"><p class="text-[10px] text-slate-400 font-bold uppercase">Orang Tua / Wali</p><h4 class="text-lg font-bold text-[#004269]">{{ session('dummy_parent', 'Bpk. Supriyadi') }}</h4><p class="text-slate-600 font-medium text-sm mt-1">{{ session('dummy_parent_hp', '+62 811 9988 7766') }}</p></div>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                        <div class="w-14 h-14 rounded-full bg-[#009DA5]/10 flex items-center justify-center text-[#009DA5] shrink-0"><i class="fas fa-ambulance text-xl"></i></div>
                                        <div class="flex-1"><p class="text-[10px] text-slate-400 font-bold uppercase">Kerabat Dekat (Darurat)</p><h4 class="text-lg font-bold text-[#004269]">Kerabat</h4><p class="text-slate-600 font-medium text-sm mt-1">{{ session('dummy_emergency', '+62 812 3344 5566') }}</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Dosen Wali --}}
                        <div class="rounded-[2rem] p-6 text-white relative overflow-hidden flex items-center justify-between mt-6 shadow-lg" style="background: linear-gradient(135deg, #004269 0%, #009DA5 100%);">
                            <div class="relative z-10"><p class="text-blue-100 text-[10px] font-bold uppercase tracking-widest mb-1">Dosen Pembimbing Akademik</p><h4 class="text-xl font-bold">Dr. Budi Santoso, M.Kom</h4></div>
                            <button type="button" class="relative z-10 bg-white text-[#004269] w-12 h-12 rounded-2xl flex items-center justify-center shadow-lg hover:bg-[#F15B67] hover:text-white transition duration-300"><i class="fas fa-comment-dots text-lg"></i></button>
                        </div>
                    </div>

                    {{-- ================= EDIT MODE SECTION ================= --}}
                    <div x-show="isEditing" x-cloak class="fade-in">
                        <div class="bg-white rounded-[2.5rem] p-8 shadow-xl border-2 border-[#009DA5] relative">
                            <div class="flex items-center justify-between mb-8 border-b border-slate-100 pb-4">
                                <h3 class="text-2xl font-bold text-[#004269] flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-[#009DA5]/10 flex items-center justify-center text-[#009DA5]"><i class="fas fa-pen"></i></div> Edit Data Profil
                                </h3>
                                <span class="bg-blue-50 text-[#004269] text-xs font-bold px-3 py-1 rounded-full border border-blue-100">Mode Edit Aktif</span>
                            </div>

                            <div class="space-y-8">
                                <div><h4 class="text-sm font-bold text-[#F15B67] uppercase tracking-wide mb-4 flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Alamat Domisili</h4>
                                    <div class="space-y-4">
                                        <div><label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap Saat Ini</label><textarea name="domisili" rows="3" class="w-full rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 p-4 transition" placeholder="Contoh: Kost Griya, Jl. Mawar No. 12...">{{ session('dummy_domisili', 'Kost Griya Sejahtera, Jl. Kramat Raya No. 128, Kamar 204, Senen, Jakarta Pusat 10430') }}</textarea><p class="text-xs text-slate-400 mt-1">*Alamat ini digunakan untuk korespondensi kampus.</p></div>
                                    </div>
                                </div>
                                <div class="border-t border-slate-100 my-4"></div>
                                <div><h4 class="text-sm font-bold text-[#F15B67] uppercase tracking-wide mb-4 flex items-center gap-2"><i class="fas fa-address-book"></i> Kontak</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div><label class="block text-sm font-semibold text-slate-700 mb-2">No. Handphone Pribadi</label><div class="relative"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-mobile-alt"></i></div><input type="text" name="phone" value="{{ session('dummy_phone', '+62 812 3456 7890') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12"></div></div>
                                        <div><label class="block text-sm font-semibold text-slate-700 mb-2">Nama Orang Tua / Wali</label><div class="relative"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-user"></i></div><input type="text" name="parent_name" value="{{ session('dummy_parent', 'Bpk. Supriyadi') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12"></div></div>
                                        <div><label class="block text-sm font-semibold text-slate-700 mb-2">No. HP Orang Tua / Wali</label><div class="relative"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-phone"></i></div><input type="text" name="parent_phone" value="{{ session('dummy_parent_hp', '+62 811 9988 7766') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12"></div></div>
                                        <div><label class="block text-sm font-semibold text-slate-700 mb-2">No. HP Kerabat Dekat</label><div class="relative"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-ambulance"></i></div><input type="text" name="emergency_phone" value="{{ session('dummy_emergency', '+62 812 3344 5566') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12"></div></div>
                                    </div>
                                </div>
                                <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex gap-3"><i class="fas fa-info-circle text-[#004269] mt-0.5"></i><p class="text-xs text-[#004269]">Perubahan data biodata utama (Nama, NIM, Alamat KTP) hanya dapat dilakukan melalui Bagian Administrasi Akademik (BAA).</p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</x-app-layout>