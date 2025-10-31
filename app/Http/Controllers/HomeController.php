<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Faq;
use App\Models\Program;
use App\Models\Fasilitas;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $testimoni = Testimoni::orderBy('created_at', 'desc')->limit(3)->get();
        $faqs = Faq::orderBy('created_at', 'desc')->limit(6)->get();
        
        return view('home', compact('testimoni', 'faqs'));
    }
}
