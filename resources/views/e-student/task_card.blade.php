<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Tugas - Elegan Polkadot</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fce7f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative; /* Penting untuk tombol absolute/fixed */
        }

        /* --- TOMBOL KEMBALI (POJOK KANAN ATAS) --- */
        .btn-back-floating {
            position: fixed;
            top: 30px;
            right: 30px;
            background: white;
            color: #ec4899; /* Pink */
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.2);
            border: 2px solid white;
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 50;
        }

        .btn-back-floating:hover {
            background: #ec4899;
            color: white;
            transform: rotate(-90deg); /* Efek putar sedikit saat hover */
            box-shadow: 0 8px 20px rgba(236, 72, 153, 0.4);
        }

        /* Tooltip teks kecil saat hover */
     

        .btn-back-floating:hover::after {
            opacity: 1;
            visibility: visible;
            right: 60px; /* Geser sedikit */
        }


        /* --- CONTAINER UTAMA --- */
        .card-container {
            width: 750px;
            height: 400px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(190, 24, 93, 0.15);
            display: flex;
            overflow: hidden;
            position: relative;
        }

        /* --- SISI KIRI (PINK) --- */
        .side-pink {
            width: 280px; 
            flex-shrink: 0;
            background: linear-gradient(180deg, #ec4899 0%, #be185d 100%);
            color: white;
            padding: 60px 30px 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            position: relative;
            z-index: 2;
        }

        /* Pola Titik-Titik */
        .side-pink::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(rgba(255,255,255,0.2) 1.5px, transparent 1.5px);
            background-size: 20px 20px;
            opacity: 0.8;
            pointer-events: none;
            z-index: 0;
        }

        .side-pink::after {
            content: '';
            position: absolute;
            bottom: -30px; right: -30px;
            width: 140px; height: 140px;
            border-radius: 50%;
            border: 25px solid rgba(255,255,255,0.08);
            pointer-events: none;
            z-index: 0;
        }

        .side-pink > div { position: relative; z-index: 10; }

        /* --- SISI KANAN (PUTIH) --- */
        .side-white {
            flex-grow: 1;
            padding: 35px 45px;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 1;
        }

        /* --- ELEMEN UI --- */
        .label-text {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9ca3af;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .value-text {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
        }

        .icon-bullet {
            width: 28px; height: 28px;
            border-radius: 8px;
            background-color: #f3f4f6;
            color: #6b7280;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px;
            margin-right: 10px;
        }
        .icon-bullet.pink {
            background-color: #fce7f3; color: #ec4899;
        }

        .file-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            border: 1px solid #fce7f3;
            border-radius: 12px;
            padding: 10px 16px;
            margin-top: 5px;
            transition: 0.2s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }
        .file-box:hover {
            border-color: #ec4899;
            background-color: #fff1f2;
            transform: translateY(-1px);
        }

        .btn-download {
            background: #fdf2f8;
            color: #be185d;
            border: none;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            text-decoration: none;
            display: flex; align-items: center; gap: 6px;
            transition: 0.2s;
        }
        .btn-download:hover {
            background: #be185d; color: white;
        }

        .btn-primary {
            background: linear-gradient(90deg, #ec4899 0%, #be185d 100%);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: 0.3s;
            display: flex; align-items: center; gap: 8px;
            box-shadow: 0 4px 10px rgba(236, 72, 153, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(236, 72, 153, 0.5);
        }

        .view-layer {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            display: flex; 
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.4s ease;
        }
        .view-info { opacity: 1; transform: translateY(0); pointer-events: auto; z-index: 10; }
        .view-upload { opacity: 0; transform: translateY(20px); pointer-events: none; z-index: 0; }
        
        .card-container.mode-upload .view-info { opacity: 0; transform: translateY(-20px); pointer-events: none; }
        .card-container.mode-upload .view-upload { opacity: 1; transform: translateY(0); pointer-events: auto; z-index: 20; }

        .upload-clean {
            border: 2px dashed #fbcfe8;
            background: #fff0f7;
            border-radius: 12px;
            height: 100%;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            cursor: pointer; transition: 0.2s;
        }
        .upload-clean:hover { border-color: #ec4899; background: #fff; }

    </style>
</head>
<body>

<a href="/tugas"  class="btn-back-floating">
    <i class="fas fa-arrow-left"></i>
</a>

@if(session('success'))
    <div class="fixed top-6 right-6 z-50 animate-bounce" style="margin-top: 60px;"> <div class="bg-white border-l-4 border-pink-500 px-6 py-4 rounded shadow-lg flex items-center gap-3">
            <i class="fas fa-heart text-pink-500"></i>
            <div>
                <p class="text-sm font-bold text-gray-800">Berhasil</p>
                <p class="text-xs text-gray-500">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

<div class="card-container" id="mainCard">

    <div class="view-layer view-info">
        
        <div class="side-pink">
            <div class="relative z-10">
                <div class="mb-4 text-white/90">
                    <i class="fas fa-book-reader text-3xl"></i>
                </div>
                
                <p class="text-[10px] font-bold tracking-widest uppercase mb-1 opacity-70">
                    Mata Kuliah
                </p>
                
                <h2 class="text-lg font-medium leading-tight mb-3 opacity-100 font-serif italic">
                    {{ $task['material_title'] }}
                </h2>
                
                <div class="w-10 h-1 bg-white/50 mb-4 rounded-full"></div>
                
                <h1 class="text-2xl font-bold leading-snug">
                    {{ $task['assignment_title'] }}
                </h1>
            </div>
        </div>

        <div class="side-white">
            
            <div class="flex-grow flex flex-col justify-center">
                
                <div class="mb-5">
                    <p class="label-text ml-1">Dosen Pengampu</p>
                    <div class="flex items-center">
                        <div class="icon-bullet">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <p class="value-text">{{ $task['lecturer_name'] }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="label-text ml-1">Batas Pengumpulan</p>
                    <div class="flex items-center">
                        <div class="icon-bullet pink">
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <p class="value-text text-pink-600">{{ $task['submission_deadline'] }}</p>
                    </div>
                </div>

                <div>
                    <p class="label-text ml-1">Materi Tugas</p>
                    <div class="file-box">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <i class="fas fa-file-alt text-gray-400 text-lg"></i>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-gray-700 truncate w-40">Soal_Tugas.pdf</span>
                                <span class="text-[10px] text-gray-400">PDF • 1.2 MB</span>
                            </div>
                        </div>
                        <a href="{{ $task['material_file_link'] }}" class="btn-download">
                            Unduh
                        </a>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-100 pt-4 flex items-center justify-between mt-2">
                <div class="flex flex-col">
                    <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Status</span>
                    <span class="text-xs font-semibold text-gray-500">Belum dikerjakan</span>
                </div>
                <button onclick="toggleView()" class="btn-primary">
                    Kerjakan Tugas <i class="fas fa-arrow-right text-[10px]"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="view-layer view-upload">
        <div class="side-pink">
            <div class="relative z-10">
                <h2 class="text-xl font-bold mb-4">Upload File</h2>
                <div class="space-y-4 text-sm opacity-95">
                    <p class="text-xs leading-relaxed font-light">
                        Silakan unggah file jawaban Anda. Pastikan format sesuai ketentuan.
                    </p>
                    <div class="bg-white/10 p-4 rounded-xl border border-white/20 backdrop-blur-sm">
                        <ul class="space-y-2">
                            @foreach ($task['file_rules'] as $rule)
                            <li class="flex items-start gap-2 text-xs">
                                <i class="fas fa-check-circle mt-0.5 text-pink-200"></i> {{ $rule }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <button onclick="toggleView()" class="mt-6 flex items-center gap-2 text-xs font-bold hover:text-pink-100 transition">
                        <i class="fas fa-arrow-left"></i> Batal & Kembali
                    </button>
                </div>
            </div>
        </div>

        <div class="side-white">
            <h3 class="text-lg font-bold text-gray-800 mb-1">Unggah Jawaban</h3>
            <p class="text-xs text-gray-400 mb-4">Silakan unggah file jawaban Anda.</p>

            <form id="uploadForm" action="{{ route('tugas.submit', ['id' => $task['id']]) }}" method="POST" enctype="multipart/form-data" class="flex-grow flex flex-col">
                @csrf
                <div class="flex-grow mb-4">
                    <div class="upload-clean" onclick="document.getElementById('fileInput').click()">
                        <input type="file" name="submission_file" id="fileInput" class="hidden" onchange="handleFile(this)">
                        
                        <div id="state_empty" class="text-center p-6">
                            <i class="fas fa-cloud-upload-alt text-3xl text-pink-200 mb-2"></i>
                            <p class="text-sm font-bold text-gray-600">Klik untuk Pilih File</p>
                            <p class="text-[10px] text-gray-400 mt-1">PDF/ZIP (Max 5MB)</p>
                        </div>

                        <div id="state_filled" class="hidden w-full px-6 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center text-green-500 border border-green-100">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="text-left">
                                    <p id="fileName" class="text-sm font-bold text-gray-800 truncate w-40">file.pdf</p>
                                    <p class="text-xs text-green-500 font-medium">Siap dikirim</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold text-white bg-green-400 px-2 py-1 rounded-full">OK</span>
                        </div>
                    </div>
                </div>

                <button type="submit" id="btnSubmit" class="w-full py-3 rounded-full bg-gray-100 text-gray-400 font-bold text-sm cursor-not-allowed transition" disabled>
                    KIRIM JAWABAN
                </button>
            </form>
        </div>
    </div>

</div>

<script>
    const card = document.getElementById('mainCard');
    const stateEmpty = document.getElementById('state_empty');
    const stateFilled = document.getElementById('state_filled');
    const fileName = document.getElementById('fileName');
    const btnSubmit = document.getElementById('btnSubmit');

    function toggleView() {
        card.classList.toggle('mode-upload');
    }

    function handleFile(input) {
        if (input.files && input.files[0]) {
            stateEmpty.classList.add('hidden');
            stateFilled.classList.remove('hidden');
            stateFilled.classList.add('flex');
            fileName.textContent = input.files[0].name;

            btnSubmit.disabled = false;
            btnSubmit.classList.remove('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
            btnSubmit.style.background = 'linear-gradient(90deg, #ec4899 0%, #be185d 100%)';
            btnSubmit.classList.add('text-white', 'shadow-lg');
            btnSubmit.style.cursor = 'pointer';
        } else {
            stateEmpty.classList.remove('hidden');
            stateFilled.classList.add('hidden');
            stateFilled.classList.remove('flex');
            
            btnSubmit.disabled = true;
            btnSubmit.style.background = '#f3f4f6';
            btnSubmit.classList.add('text-gray-400', 'cursor-not-allowed');
            btnSubmit.classList.remove('text-white', 'shadow-lg');
        }
    }
</script>

</body>
</html>