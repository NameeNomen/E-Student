<x-guest-layout>
    
    {{-- Container Utama dan Card Notebook --}}
    <div class="w-full max-w-md notebook-card">
        
        {{-- Header Notebook (Warna Ungu-Biru) --}}
        <div class="notebook-header bg-indigo-500 text-white px-8 py-10 rounded-t-xl">
            <h1 class="text-4xl font-extrabold">
                Selamat datang
            </h1>
            <p class="mt-2 text-xl font-light">
                Di E-student
            </p>
        </div>

        {{-- Form Login --}}
        <div class="notebook-form bg-white px-8 py-10 space-y-7">
            
            {{-- Form harus diarahkan ke route 'login' bawaan Breeze --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-7">
                @csrf
                
                {{-- --- Input NIPD (digantikan dengan email/NIPD) --- --}}
                <div>
                    {{-- Label & Input untuk NIPD (Email) --}}
                    <x-input-label for="email" :value="__('NIPD (Email)')" class="text-lg font-semibold text-indigo-600 mb-2" />
                    <x-text-input id="email" class="input-style block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan NIPD/Email Anda" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- --- Input Password --- --}}
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold text-indigo-600 mb-2" />
                    <x-text-input id="password" class="input-style block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan Password Anda" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- --- Tombol Submit --- --}}
                <button type="submit" class="submit-button bg-indigo-500 hover:bg-indigo-600 text-white py-3 px-6 rounded-xl font-bold uppercase tracking-wide shadow-lg w-full transition duration-300">
                    Submit
                </button>
            </form>
            
            {{-- Link Register --}}
            <div class="register-text">
                <p class="text-pink-500 font-medium">
                    Belum punya akun yah? 
                    {{-- Menggunakan route register bawaan Breeze --}}
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-bold underline hover:text-pink-600">register dulu ya~~</a>
                    @endif
                </p>
            </div>
            
        </div>
    </div>
    
    {{-- Memasukkan CSS & Animasi Kustom --}}
    @push('styles')
    <style>
        /* Mengganti latar belakang body bawaan Breeze */
        body {
            background-color: #f4f4f9 !important; /* Background abu-abu muda */
            font-family: 'Poppins', sans-serif !important;
        }

        /* Gaya Khusus Efek Buku Catatan */
        .notebook-card {
            background-color: #ffffff;
            border: 4px solid #d1d5db; /* border abu-abu */
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        /* Garis Margin Buku Catatan (Kuning) */
        .notebook-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20px; 
            width: 2px;
            height: 100%;
            background-color: #fde047; /* Kuning Cerah */
            z-index: 0;
        }
        
        /* Mengatur ulang posisi z-index untuk header dan form */
        .notebook-header, .notebook-form {
            position: relative;
            z-index: 1;
        }
        
        /* Gaya Input yang Fokus pada Pink */
        .input-style {
            padding: 12px 16px;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            transition: all 0.2s ease-in-out;
        }
        
        .input-style::placeholder {
            color: rgba(244, 114, 182, 0.7); /* Pink transparan */
            font-weight: 500;
        }
        
        .input-style:focus {
            outline: none;
            border-color: #f472b6; /* Pink */
            box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.3); /* Shadow Pink */
        }
    </style>
    @endpush
    
    {{-- Catatan: x-guest-layout sudah menangani pemusatan (centering) --}}
</x-guest-layout>