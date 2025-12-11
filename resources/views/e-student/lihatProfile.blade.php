<x-app-layout>
    {{-- Import Font Modern --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Animasi Transisi */
        .fade-in { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Utility untuk menyembunyikan elemen */
        .hidden-mode { display: none !important; }
    </style>

    {{-- Background Decorative --}}
    <div class="fixed inset-0 -z-10 bg-[#F8FAFC] overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-[350px] bg-[#004269]">
            <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-[#009DA5] opacity-20 rounded-full blur-[100px]"></div>
            <div class="absolute top-[20%] right-[-5%] w-[300px] h-[300px] bg-[#F15B67] opacity-20 rounded-full blur-[80px]"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
        </div>
    </div>

    <div class="py-10 px-4 sm:px-6 lg:px-8 relative">
        
        {{-- Flash Message Success (Opsional: Muncul kalau berhasil simpan) --}}
        @if(session('success'))
        <div class="max-w-6xl mx-auto mb-6 bg-emerald-500 text-white p-4 rounded-xl shadow-lg fade-in flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-xl"></i>
                <span class="font-bold">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="hover:bg-white/20 p-2 rounded-full transition"><i class="fas fa-times"></i></button>
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
        {{-- ACTION mengarah ke route 'lihatProfile.store' --}}
        <form action="{{ route('lihatProfile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                {{-- LEFT COLUMN: Profile Card (Sticky) --}}
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden relative border border-slate-100 sticky top-6">
                        {{-- Cover --}}
                        <div class="h-32 bg-gradient-to-r from-[#009DA5] to-[#004269] relative">
                             <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <div class="px-6 pb-8 text-center relative">
                            {{-- Photo Section --}}
                            <div class="-mt-16 mb-4 inline-block relative group">
                                <div class="w-32 h-32 rounded-full border-[5px] border-white shadow-lg overflow-hidden bg-slate-100 relative">
                                    <img id="profile-preview" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Mahasiswa') }}&background=004269&color=fff&size=512" alt="Profile" class="w-full h-full object-cover transition duration-300 group-hover:brightness-75">
                                    
                                    {{-- Overlay Edit Photo --}}
                                    <div id="photo-overlay" class="hidden-mode absolute inset-0 bg-black/40 flex items-center justify-center">
                                        <i class="fas fa-cloud-upload-alt text-white text-2xl"></i>
                                    </div>
                                </div>
                                
                                <input type="file" id="photo-input" name="photo" class="hidden" accept="image/*" onchange="previewImage(event)">
                                
                                <label for="photo-input" id="camera-btn" class="hidden-mode absolute bottom-1 right-1 w-8 h-8 bg-[#F15B67] border-2 border-white rounded-full flex items-center justify-center text-white shadow-md cursor-pointer hover:scale-110 transition z-20">
                                    <i class="fas fa-camera text-xs"></i>
                                </label>
                            </div>

                            <h2 class="text-xl font-bold text-[#004269]">{{ Auth::user()->name ?? 'Nama Mahasiswa' }}</h2>
                            <div class="bg-red-100 text-red-700 p-2 rounded text-xs mt-2 border border-red-300">
    <strong>DEBUG INFO:</strong><br>
    Isi Session Path: "{{ session('dummy_photo_path') ?? 'KOSONG' }}"
</div>
                            <p class="text-[#009DA5] text-sm font-medium">Teknik Informatika - D3</p>
                            
                            <div class="mt-4 flex justify-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold border border-emerald-100 flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Aktif
                                </span>
                            </div>

                            {{-- Stats --}}
                            <div class="grid grid-cols-2 gap-2 mt-6 pt-6 border-t border-slate-100">
                                <div class="text-center">
                                    <span class="block text-2xl font-extrabold text-[#004269]">3.05</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">IPK Kumulatif</span>
                                </div>
                                <div class="text-center border-l border-slate-100">
                                    <span class="block text-2xl font-extrabold text-[#004269]">114</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">SKS Lulus</span>
                                </div>
                            </div>

                            {{-- Action Button (VIEW MODE ONLY) --}}
                            <div id="view-actions" class="mt-6">
                                <button type="button" onclick="toggleEditMode(true)" class="w-full py-3 rounded-xl bg-[#004269] text-white font-semibold text-sm shadow-lg shadow-blue-900/20 hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-center gap-2">
                                    <i class="fas fa-user-edit"></i> Edit Data Diri
                                </button>
                            </div>
                            
                            {{-- Action Button (EDIT MODE ONLY) --}}
                            <div id="edit-actions" class="mt-6 hidden-mode space-y-3">
                                <button type="submit" class="w-full py-3 rounded-xl bg-[#009DA5] text-white font-semibold text-sm shadow-lg shadow-teal-500/20 hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-center gap-2">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <button type="button" onclick="toggleEditMode(false)" class="w-full py-3 rounded-xl bg-slate-100 text-slate-600 font-semibold text-sm hover:bg-slate-200 transition">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: Detailed Info & Tabs --}}
                <div class="lg:col-span-8 space-y-6">
                    
                    {{-- ================= VIEW MODE SECTION ================= --}}
                    <div id="view-mode-content" class="fade-in">
                        
                        {{-- Tabs Navigation --}}
                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-2 shadow-sm border border-slate-100 flex gap-2 overflow-x-auto sticky top-6 z-20 mb-6">
                            <button type="button" onclick="switchTab('biodata')" id="btn-biodata" class="tab-btn flex-1 py-3 px-4 rounded-xl font-bold text-sm shadow-md transition bg-[#009DA5] text-white">
                                Biodata Diri
                            </button>
                            <button type="button" onclick="switchTab('alamat')" id="btn-alamat" class="tab-btn flex-1 py-3 px-4 rounded-xl font-medium text-sm transition text-slate-500 hover:bg-slate-50">
                                Data Alamat
                            </button>
                            <button type="button" onclick="switchTab('kontak')" id="btn-kontak" class="tab-btn flex-1 py-3 px-4 rounded-xl font-medium text-sm transition text-slate-500 hover:bg-slate-50">
                                Kontak
                            </button>
                        </div>

                        {{-- TAB 1: BIODATA DIRI (View) --}}
                        <div id="tab-biodata" class="tab-content active">
                            <div class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-slate-100 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-[#009DA5] opacity-5 rounded-bl-full pointer-events-none"></div>
                                <h3 class="text-xl font-bold text-[#004269] mb-6 flex items-center gap-2">
                                    <span class="w-2 h-6 bg-[#F15B67] rounded-full"></span> Informasi Pribadi
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                    {{-- Read Only Fields --}}
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">NIM</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="far fa-id-badge text-[#009DA5]"></i><span class="text-slate-700 font-bold">2021004012</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">Email</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="far fa-envelope text-[#009DA5]"></i><span class="text-slate-700 font-bold truncate">{{ Auth::user()->email ?? 'mahasiswa@lp3i.ac.id' }}</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">TTL</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="far fa-calendar-alt text-[#009DA5]"></i><span class="text-slate-700 font-bold">Jakarta, 12 Agustus 2003</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">Gender</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="fas fa-venus-mars text-[#009DA5]"></i><span class="text-slate-700 font-bold">Laki-laki</span></div></div>
                                    <div class="group"><label class="text-xs text-slate-400 font-bold uppercase block mb-1">Agama</label><div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100"><i class="fas fa-pray text-[#009DA5]"></i><span class="text-slate-700 font-bold">Islam</span></div></div>
                                    {{-- NO TELP PRIBADI (VIEW - AMBIL DARI SESSION) --}}
                                    <div class="group">
                                        <label class="text-xs text-slate-400 font-bold uppercase block mb-1">No. Telp</label>
                                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                                            <i class="fas fa-phone text-[#009DA5]"></i>
                                            <span class="text-slate-700 font-bold">{{ session('dummy_phone', '+62 812 3456 7890') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TAB 2: ALAMAT (View) --}}
                        <div id="tab-alamat" class="tab-content hidden-mode">
                            <div class="space-y-4">
                                <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-slate-100 flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-[#004269] flex items-center justify-center text-white shrink-0"><i class="fas fa-id-card"></i></div>
                                    <div><h4 class="text-sm font-bold text-[#004269] uppercase mb-1">Alamat Asli (KTP)</h4><p class="text-slate-600 text-sm">Jl. Merdeka Selatan No. 45, RT.01/RW.02, Kel. Gambir, Kec. Gambir, Jakarta Pusat 10110</p></div>
                                </div>
                                <div class="bg-white rounded-[2rem] p-6 shadow-lg border border-slate-100 flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-[#009DA5] flex items-center justify-center text-white shrink-0"><i class="fas fa-map-marker-alt"></i></div>
                                    <div>
                                        <h4 class="text-sm font-bold text-[#009DA5] uppercase mb-1">Alamat Domisili</h4>
                                        {{-- DOMISILI (VIEW - AMBIL DARI SESSION) --}}
                                        <p class="text-slate-600 text-sm">{{ session('dummy_domisili', 'Kost Griya Sejahtera, Jl. Kramat Raya No. 128, Kamar 204, Senen, Jakarta Pusat 10430') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TAB 3: KONTAK (View) --}}
                        <div id="tab-kontak" class="tab-content hidden-mode">
                            <div class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-slate-100">
                                <h3 class="text-xl font-bold text-[#004269] mb-6 flex items-center gap-2"><span class="w-2 h-6 bg-[#F15B67] rounded-full"></span> Kontak Darurat</h3>
                                <div class="space-y-6">
                                    {{-- Orang Tua View --}}
                                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                        <div class="w-14 h-14 rounded-full bg-[#F15B67]/10 flex items-center justify-center text-[#F15B67] shrink-0"><i class="fas fa-user-friends text-xl"></i></div>
                                        <div class="flex-1">
                                            <p class="text-[10px] text-slate-400 font-bold uppercase">Orang Tua / Wali</p>
                                            <h4 class="text-lg font-bold text-[#004269]">{{ session('dummy_parent', 'Bpk. Supriyadi') }}</h4>
                                            <p class="text-slate-600 font-medium text-sm mt-1">{{ session('dummy_parent_hp', '+62 811 9988 7766') }}</p>
                                        </div>
                                    </div>
                                    
                                    {{-- Kerabat Darurat View --}}
                                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                        <div class="w-14 h-14 rounded-full bg-[#009DA5]/10 flex items-center justify-center text-[#009DA5] shrink-0"><i class="fas fa-ambulance text-xl"></i></div>
                                        <div class="flex-1">
                                            <p class="text-[10px] text-slate-400 font-bold uppercase">Kerabat Dekat (Darurat)</p>
                                            <h4 class="text-lg font-bold text-[#004269]">Kerabat</h4>
                                            <p class="text-slate-600 font-medium text-sm mt-1">{{ session('dummy_emergency', '+62 812 3344 5566') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Dosen Wali (Sticky Bottom) --}}
                        <div class="rounded-[2rem] p-6 text-white relative overflow-hidden flex items-center justify-between mt-6 shadow-lg" style="background: linear-gradient(135deg, #004269 0%, #009DA5 100%);">
                            <div class="relative z-10">
                                <p class="text-blue-100 text-[10px] font-bold uppercase tracking-widest mb-1">Dosen Pembimbing Akademik</p>
                                <h4 class="text-xl font-bold">Dr. Budi Santoso, M.Kom</h4>
                            </div>
                            <button type="button" class="relative z-10 bg-white text-[#004269] w-12 h-12 rounded-2xl flex items-center justify-center shadow-lg hover:bg-[#F15B67] hover:text-white transition duration-300"><i class="fas fa-comment-dots text-lg"></i></button>
                        </div>
                    </div>

                    {{-- ================= EDIT MODE SECTION ================= --}}
                    {{-- Ini hanya muncul saat tombol Edit diklik --}}
                    <div id="edit-mode-content" class="hidden-mode fade-in">
                        <div class="bg-white rounded-[2.5rem] p-8 shadow-xl border-2 border-[#009DA5] relative">
                            
                            {{-- Header Edit --}}
                            <div class="flex items-center justify-between mb-8 border-b border-slate-100 pb-4">
                                <h3 class="text-2xl font-bold text-[#004269] flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-[#009DA5]/10 flex items-center justify-center text-[#009DA5]">
                                        <i class="fas fa-pen"></i>
                                    </div>
                                    Edit Data Profil
                                </h3>
                                <span class="bg-blue-50 text-[#004269] text-xs font-bold px-3 py-1 rounded-full border border-blue-100">Mode Edit Aktif</span>
                            </div>

                            <div class="space-y-8">
                                {{-- 1. ALAMAT DOMISILI --}}
                                <div>
                                    <h4 class="text-sm font-bold text-[#F15B67] uppercase tracking-wide mb-4 flex items-center gap-2">
                                        <i class="fas fa-map-marker-alt"></i> Alamat Domisili
                                    </h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap Saat Ini</label>
                                            {{-- TEXTAREA EDIT - AMBIL SESSION --}}
                                            <textarea name="domisili" rows="3" class="w-full rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 p-4 transition" placeholder="Contoh: Kost Griya, Jl. Mawar No. 12...">{{ session('dummy_domisili', 'Kost Griya Sejahtera, Jl. Kramat Raya No. 128, Kamar 204, Senen, Jakarta Pusat 10430') }}</textarea>
                                            <p class="text-xs text-slate-400 mt-1">*Alamat ini digunakan untuk korespondensi kampus.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-slate-100 my-4"></div>

                                {{-- 2. KONTAK PRIBADI & DARURAT --}}
                                <div>
                                    <h4 class="text-sm font-bold text-[#F15B67] uppercase tracking-wide mb-4 flex items-center gap-2">
                                        <i class="fas fa-address-book"></i> Kontak
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        {{-- No HP Pribadi --}}
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">No. Handphone Pribadi</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-mobile-alt"></i></div>
                                                {{-- INPUT PHONE EDIT - AMBIL SESSION --}}
                                                <input type="text" name="phone" value="{{ session('dummy_phone', '+62 812 3456 7890') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12">
                                            </div>
                                        </div>

                                        {{-- Nama Orang Tua --}}
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Orang Tua / Wali</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-user"></i></div>
                                                {{-- INPUT PARENT NAME EDIT - AMBIL SESSION --}}
                                                <input type="text" name="parent_name" value="{{ session('dummy_parent', 'Bpk. Supriyadi') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12">
                                            </div>
                                        </div>

                                        {{-- No HP Orang Tua --}}
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">No. HP Orang Tua / Wali</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-phone"></i></div>
                                                {{-- INPUT PARENT PHONE EDIT - AMBIL SESSION --}}
                                                <input type="text" name="parent_phone" value="{{ session('dummy_parent_hp', '+62 811 9988 7766') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12">
                                            </div>
                                        </div>

                                        {{-- Kontak Darurat Lain --}}
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">No. HP Kerabat Dekat</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400"><i class="fas fa-ambulance"></i></div>
                                                {{-- INPUT EMERGENCY EDIT - AMBIL SESSION --}}
                                                <input type="text" name="emergency_phone" value="{{ session('dummy_emergency', '+62 812 3344 5566') }}" class="w-full pl-10 rounded-xl border-slate-200 focus:border-[#009DA5] focus:ring focus:ring-[#009DA5]/20 text-slate-700 h-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex gap-3">
                                    <i class="fas fa-info-circle text-[#004269] mt-0.5"></i>
                                    <p class="text-xs text-[#004269]">Perubahan data biodata utama (Nama, NIM, Alamat KTP) hanya dapat dilakukan melalui Bagian Administrasi Akademik (BAA).</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Tab Switching Logic
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden-mode');
                el.classList.remove('active');
            });
            document.getElementById('tab-' + tabId).classList.remove('hidden-mode');
            document.getElementById('tab-' + tabId).classList.add('active');

            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-[#009DA5]', 'text-white', 'shadow-md');
                btn.classList.add('text-slate-500', 'hover:bg-slate-50');
            });

            const activeBtn = document.getElementById('btn-' + tabId);
            activeBtn.classList.remove('text-slate-500', 'hover:bg-slate-50');
            activeBtn.classList.add('bg-[#009DA5]', 'text-white', 'shadow-md');
        }

        // Edit Mode Toggle Logic
        function toggleEditMode(isEditing) {
            const viewContent = document.getElementById('view-mode-content');
            const editContent = document.getElementById('edit-mode-content');
            const viewActions = document.getElementById('view-actions');
            const editActions = document.getElementById('edit-actions');
            
            // Photo Buttons
            const cameraBtn = document.getElementById('camera-btn');
            const photoOverlay = document.getElementById('photo-overlay');

            if (isEditing) {
                // Show Edit Mode
                viewContent.classList.add('hidden-mode');
                editContent.classList.remove('hidden-mode');
                
                viewActions.classList.add('hidden-mode');
                editActions.classList.remove('hidden-mode');
                
                cameraBtn.classList.remove('hidden-mode');
                photoOverlay.classList.remove('hidden-mode');
            } else {
                // Revert to View Mode
                viewContent.classList.remove('hidden-mode');
                editContent.classList.add('hidden-mode');
                
                viewActions.classList.remove('hidden-mode');
                editActions.classList.add('hidden-mode');
                
                cameraBtn.classList.add('hidden-mode');
                photoOverlay.classList.add('hidden-mode');
            }
        }

        // Image Preview Logic
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('profile-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    @endpush
</x-app-layout>