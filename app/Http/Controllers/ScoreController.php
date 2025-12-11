<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(Request $request)
    {
        // 1. Definisikan Data
        $semesters = ['1 SEMESTER', '2 SEMESTER', '3 SEMESTER'];

        $summary = [
            'id' => 'summary',
            'title' => 'Academic Profile Summary',
            'subtitle' => 'Ringkasan performa akademik Anda',
            'bg_color' => 'bg-[#009DA5]',
            'btn_color' => 'bg-[#009DA5] text-white hover:bg-teal-700',
            'icon' => '<svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
        ];

        $gridData = [
            [
                'id' => 'component',
                'title' => 'Component Scores',
                'subtitle' => 'Nilai Komponen',
                'bg_color' => 'bg-[#004269]',
                'btn_color' => 'bg-[#004269] text-white hover:bg-[#003355]',
                'icon' => '<svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
            ],
            [
                'id' => 'khs',
                'title' => 'Result Card (KHS)',
                'subtitle' => 'Kartu Hasil Studi',
                'bg_color' => 'bg-[#FF0000]',
                'btn_color' => 'bg-[#FF0000] text-white hover:bg-red-700',
                'icon' => '<svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>'
            ]
        ];

        // 2. Return View dengan COMPACT
        // Pastikan nama view sesuai: 'e-student.score'
        return view('e-student.score', compact('semesters', 'summary', 'gridData'));
    }
}