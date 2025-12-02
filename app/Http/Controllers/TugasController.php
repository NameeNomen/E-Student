<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $task = [
            [
                'id' => 1,
                'title' => 'Introduction to Computer Technology',
                'assignments_count' => 2,
                'status' => 'Aktif',
                'image' => 'Image-folder-pana.svg',
                'color' => 'text-blue-600',
               
            ],
            [
                'id' => 2,
                'title' => 'Computer for Office 2',
                'assignments_count' => 1,
                'status' => 'Aktif',
                'image' => 'Documents-bro.svg',
                'color' => 'text-purple-600',
               
            ],
            [
                'id' => 3,
                'title' => 'Web Programming',
                'assignments_count' => 0,
                'status' => 'Tidak ada',
                'image' => 'Add-files-bro.svg',
                'color' => 'text-green-600',
                
            ],
        ];

        return view('e-student.tugas', compact('task'));
    }
}
