<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Slides;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $category = Kategori::all();
        $artikel = Artikel::all();
        $slides = Slides::all();
        return view('frontend.layouts.front', [
            'category' => $category,
            'artikel' => $artikel,
            'slides' => $slides
        ]);
    }
}
