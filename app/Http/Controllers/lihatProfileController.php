<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <--- WAJIB ADA INI

class lihatProfileController extends Controller
{
    public function index()
    {
        return view('e-student.lihatProfile');
    }

    public function store(Request $request)
    {
        // 1. Simpan data Text ke Session
        session([
            'dummy_domisili'    => $request->input('domisili'),
            'dummy_phone'       => $request->input('phone'),
            'dummy_parent'      => $request->input('parent_name'),
            'dummy_parent_hp'   => $request->input('parent_phone'),
            'dummy_emergency'   => $request->input('emergency_phone'),
        ]);

        // 2. LOGIKA UPLOAD FOTO (Bagian Paling Penting)
        if ($request->hasFile('photo')) {
            // Simpan file ke folder: storage/app/public/profile-photos
            $path = $request->file('photo')->store('profile-photos', 'public');

            // Simpan alamat file ke session biar bisa dipanggil di View
            session(['dummy_photo_path' => $path]);
        }

        return redirect()->route('lihatProfile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}