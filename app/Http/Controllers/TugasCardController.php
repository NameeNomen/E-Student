<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasCardController extends Controller
{
//     public function detail($course_id)
//     {
//         // Dummy data mata kuliah & tugasnya
//         $courses = [
//             1 => [
//                 'id' => 1,
//                 'task' => [
//                     'id' => 123,
//                     'material_title' => 'Introduction to Computer Technology',
//                     'assignment_title' => 'Perancangan Modul Sistem Komputer',
//                     'lecturer_name' => 'Rahadian Dwimaribbi',
//                     'submission_deadline' => '30 November 2025',
//                     'material_file_link'=> '#',
//                     'file_name'=> 'awokawok',
//                     'file_size' => '1.2mb',
//                     'file_rules' => [
//                         'Format file PDF atau ZIP',
//                         'Maksimal 10MB',
//                         'Gunakan nama file “NIM_Nama_Tugas.pdf”'
//                     ]
//                 ]
//             ],

//             2 => [
//                 'id' => 2,
//                 'task' => [
//                     'id' => 222,
//                     'material_title' => 'Computer for Office 2',
//                     'assignment_title' => 'Membuat Mail Merge',
//                     'submission_deadline' => '18 November 2025',
//                     'material_file_link'=> '#',
//                     'file_name'=> 'hehe',
//                     'file_size' => '1.3mb',
//                     'file_rules' => [
//                         'Format file DOCX atau PDF',
//                         'Maksimum 5MB'
//                     ]
//                 ]
//             ],

//             3 => [
//                 'id' => 3,
//                 'title' => 'Web Programming',
//                 // ❌ Tidak ada tugas
//                 'task' => null
//             ],
//         ];

//         // Kalau ID tidak ditemukan
//         if (!isset($courses[$course_id])) {
//             abort(404);
//         }

//         $course = $courses[$course_id];

//         // Kalau tidak ada tugas
//         if ($course['task'] === null) {
//             return view('e-student.no_task', [
//                 'course_name' => $course['title']
//             ]);
//         }

//         // Kalau ada tugas → tampilkan kartu premium
//         $task = $course['task'];
//         return view('e-student.task_card', compact('task'));
//     }
// }
public function detail($course_id)
{
    $courses = [
        1 => [
            'id' => 1,
            'task' => [
                [
                    'id' => 123,
                    'material_title' => 'Introduction to Computer Technology',
                    'assignment_title' => 'Perancangan Modul Sistem Komputer',
                    'lecturer_name' => 'Rahadian Dwimaribbi',
                    'submission_deadline' => '30 November 2025',
                    'material_file_link'=> '#',
                    'file_name'=> 'awokawok',
                    'file_size' => '1.2mb',
                    'file_rules' => [
                        'Format file PDF atau ZIP',
                        'Maksimal 10MB',
                        'Gunakan nama file “NIM_Nama_Tugas.pdf”'
                    ]
                ],
                [
                    'id' => 124,
                    'material_title' => 'Komputer Lanjut',
                    'assignment_title' => 'Membuat Jaringan LAN',
                    'lecturer_name' => 'Rahadian Dwimaribbi',
                    'submission_deadline' => '10 Desember 2025',
                    'material_file_link'=> '#',
                    'file_name'=> 'lan_project',
                    'file_size' => '800kb',
                    'file_rules' => [
                        'Format file PDF',
                        'Maksimal 5MB'
                    ]
                ],
            ]
        ],

        2 => [
            'id' => 2,
            'task' => [
                [
                    'id' => 222,
                    'material_title' => 'Computer for Office 2',
                    'assignment_title' => 'Membuat Mail Merge',
                    'lecturer_name' => 'Anonim',
                    'submission_deadline' => '18 November 2025',
                    'material_file_link'=> '#',
                    'file_name'=> 'hehe',
                    'file_size' => '1.3mb',
                    'file_rules' => [
                        'Format file DOCX atau PDF',
                        'Maksimum 5MB'
                    ]
                ]
            ]
        ],

        3 => [
            'id' => 3,
            'title' => 'Web Programming',
            'task' => []
        ],
    ];

    if (!isset($courses[$course_id])) {
        abort(404);
    }

    $course = $courses[$course_id];

    if ($course['task'] === [] || $course['task'] === null) {
        return view('e-student.no_task', [
            'course_name' => $course['title']
        ]);
    }

    // ← Sekarang $task adalah ARRAY LIST
    $task = $course['task'][0];

    return view('e-student.task_card', compact('task'));
}
}