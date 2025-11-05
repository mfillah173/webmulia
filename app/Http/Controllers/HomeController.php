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
        $testimoni = Testimoni::orderBy('created_at', 'desc')->get();
        $faqs = Faq::orderBy('created_at', 'asc')->limit(6)->get(); // Yang terdahulu di paling atas
        
        return view('home', compact('testimoni', 'faqs'));
    }
}
