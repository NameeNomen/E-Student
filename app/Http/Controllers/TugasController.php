<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        // Warna utama SVG: #f15b67
        // Saya memasukkan kode SVG langsung ke dalam array 'image'
        // Nanti di Blade, panggil dengan: {!! $item['image'] !!}
        
        $task = [
            [
                'id' => 1,
                'title' => 'Introduction to Computer Technology',
                'assignments_count' => 2,
                'status' => 'Aktif',
                'color' => 'text-blue-600',
                // SVG Custom: Monitor Komputer / Teknologi
                'image' => '<svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4H4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4Z" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 20V22" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 20V22" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 10L14 8" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="12" cy="10" r="3" fill="#f15b67" fill-opacity="0.1" stroke="#f15b67" stroke-width="1.5"/>
                            </svg>',
            ],
            [
                'id' => 2,
                'title' => 'Computer for Office 2',
                'assignments_count' => 1,
                'status' => 'Aktif',
                'color' => 'text-purple-600',
                // SVG Custom: Dokumen / Office
                'image' => '<svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 2V8H20" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 13H16" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 17H16" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 9H8" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>',
            ],
            [
                'id' => 3,
                'title' => 'Web Programming',
                'assignments_count' => 0,
                'status' => 'Tidak ada',
                'color' => 'text-green-600',
                // SVG Custom: Coding / Web
                'image' => '<svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 18L22 12L16 6" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 6L2 12L8 18" stroke="#f15b67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect x="9" y="4" width="6" height="16" rx="1" transform="rotate(10 12 12)" fill="#f15b67" fill-opacity="0.1" stroke="#f15b67" stroke-width="1.5"/>
                            </svg>',
            ],
        ];

        return view('e-student.tugas', compact('task'));
    }
}