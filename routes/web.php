<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\ScoresController;
use Illuminate\Support\Facades\Route;

// 1. ROUTE NON-OTENTIKASI (Wajib ADA)
Route::get('/', function () {
    return redirect()->route('login'); 
})->middleware('guest'); 

// 2. ROUTE OTENTIKASI
Route::middleware('auth')->group(function () {
    
    // A. ROUTE PROFILE BREEZE (WAJIB ADA)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // B. DASHBOARD KUSTOM
    Route::get('/dashboard', function () {
        return view('e-student.dashboard'); 
    })->middleware(['verified'])->name('dashboard');

    
    // C. ROUTE E-STUDENT KUSTOM LAINNYA
    // Gunakan 'e-student' dan nama route yang sama dengan yang ada di header!
    
    Route::get('/ebook-search', function () {
        return view('e-student.e-book'); 
    })->name('ebook.search'); // <--- COCOK

    Route::get('/exam-card', function () {
        return view('e-student.examCard'); 
    })->name('exam.card'); // <--- COCOK

    Route::get('/billing', function () {
        return view('e-student.infoPembayaran'); 
    })->name('billing.info'); // <--- COCOK

    Route::get('/lecturer-schedule', function () {
        return view('e-student.jadwal_guru'); 
    })->name('schedule.lecturer'); // <--- COCOK

Route::get('/krs', [KrsController::class, 'menu'])->name('krs.menu');

    Route::get('/materials', function () {
        return view('e-student.materi'); 
    })->name('materials.index'); // <--- COCOK

    Route::get('/announcements', function () {
        return view('e-student.pengumuman'); 
    })->name('announcements.index'); // <--- COCOK

    Route::get('/score', [ScoresController::class, 'index'])->name('score.index');

    // Route Exam Card yang dipanggil di header Academic Data
    Route::get('/ujian', function () {
        return view('e-student.examCard'); 
    })->name('ujian.index'); // <--- COCOK

});

// 3. ROUTE OTENTIKASI BAWAAN BREEZE
require __DIR__.'/auth.php';