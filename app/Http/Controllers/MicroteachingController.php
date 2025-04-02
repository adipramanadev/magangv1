<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicroteachingController extends Controller
{
    //buat function index
    public function index()
    {
       $microteaching = "Microteaching";
       return view('microteaching', compact('microteaching'));
    }
}
