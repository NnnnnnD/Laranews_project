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
        return view('frontend.home', [
            'category' => $category,
            'artikel' => $artikel,
            'slides' => $slides
        ]);
    }
    public function detail($slug) {
        $artikel = Artikel::where('slug', $slug)->first();

        return view('frontend.layouts.detail-artikel' ,[
            'artikel' => $artikel,
        ]);
        
    }
}
