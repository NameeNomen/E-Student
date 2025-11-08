<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoresController extends Controller
{
       public function index()
{
    return view('e-student.score');
}
}
