<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        // Ambil data fasilitas dari database
        $fasilitas = Fasilitas::orderBy('created_at', 'desc')->get();
        
        return view('fasilitas', compact('fasilitas'));
    }
}
