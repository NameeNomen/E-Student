<?php

use App\Http\Controllers\KrsController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasCardController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\lihatProfileController;

use Illuminate\Support\Facades\Route;

// 1. ROUTE NON-OTENTIKASI (Wajib ADA)
Route::get('/', function () {
    return redirect()->route('login'); 
})->middleware('guest'); 

// 2. ROUTE OTENTIKASI
Route::middleware('auth')->group(function () {

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

    Route::get('/materi', [MateriController::class, 'index'])->name('materi');

    Route::get('/announcements', function () {
        return view('e-student.pengumuman'); 
    })->name('announcements.index'); // <--- COCOK

    Route::get('/lihatProfile', [lihatProfileController::class, 'index'])->name('lihatProfile.index');
    Route::post('/lihatProfile', [lihatProfileController::class, 'store'])->name('lihatProfile.store');
   
    Route::get('/score', [ScoreController::class, 'index'])->name('score');

    // Route Exam Card yang dipanggil di header Academic Data
    Route::get('/ujian', function () {
        return view('e-student.examCard'); 
    })->name('ujian.index'); // <--- COCOK

    Route::get('/EditProfile', function () {
        return view('e-student.EditProfile'); 
    })->name('EditProfile.index');

  // List semua mata kuliah
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');

Route::get('/tugas/{course_id}', [TugasCardController::class, 'detail'])
     ->name('tugas.detail');

Route::get('/tugas/kartu', [TaskController::class, 'showCard'])->name('tugas.card');
Route::post('/tugas/submit/{id}', [TaskController::class, 'submitTask'])->name('tugas.submit');
});

// 3. ROUTE OTENTIKASI BAWAAN BREEZE
require __DIR__.'/auth.php';