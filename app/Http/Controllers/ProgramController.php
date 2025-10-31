<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        // Ambil data program dari database
        $programs = Program::orderBy('created_at', 'desc')->get();
        
        return view('program', compact('programs'));
    }
}
