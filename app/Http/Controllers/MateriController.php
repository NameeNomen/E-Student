<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        // --- DATA DUMMY (MOCKUP DATABASE) ---
        // Nantinya ini diganti dengan: $subjects = Subject::with('materials')->get();
        // Kita tidak perlu menyimpan icon di database, karena iconnya universal di view.
        
        $subjects = [
            'k3' => [
                'name'     => 'K3 & ISO Standards', 
                'desc'     => 'Manajemen Risiko & Standar Mutu Industri',
                'progress' => 85, 
                'materials' => [
                    ['title' => 'Pengenalan K3 Umum', 'desc' => 'PDF • Pertemuan 1', 'type' => 'pdf', 'url' => '#'],
                    ['title' => 'Video Implementasi ISO', 'desc' => 'MP4 • Pertemuan 2', 'type' => 'video', 'url' => '#'],
                    ['title' => 'Form Audit Keselamatan', 'desc' => 'DOCX • Tugas Kelompok', 'type' => 'doc', 'url' => '#'],
                ]
            ],
            'sda' => [
                'name'     => 'System Design & Analysis', 
                'desc'     => 'Metodologi Pengembangan Sistem Informasi',
                'progress' => 40,
                'materials' => [
                    ['title' => 'Konsep Dasar UML', 'desc' => 'PDF • Bab 1-3', 'type' => 'pdf', 'url' => '#'],
                    ['title' => 'Teknik Requirement Gathering', 'desc' => 'PPTX • Slide Presentasi', 'type' => 'ppt', 'url' => '#'],
                ]
            ],
            'mp' => [
                'name'     => 'Mobile Programming', 
                'desc'     => 'Flutter & React Native Basics', 
                'progress' => 15, 
                'materials' => [
                    ['title' => 'Instalasi Flutter SDK', 'desc' => 'Link • Dokumentasi Resmi', 'type' => 'link', 'url' => '#'],
                ]
            ],
            'ns' => [
                'name'     => 'Network Security', 
                'desc'     => 'Dasar Keamanan Jaringan & Kriptografi', 
                'progress' => 0, 
                'materials' => [] // Array kosong
            ],
        ];

        // --- HITUNG STATISTIK (Agar Dashboard Dinamis) ---
        $stats = [
            'total_subject' => count($subjects),
            'total_materi'  => collect($subjects)->sum(function($subject) {
                return count($subject['materials']);
            }),
            'last_update'   => now()->format('d M Y')
        ];

        // Kirim data ke View
        return view('e-student.materi', compact('subjects', 'stats'));
    }
}