<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Slides;
use Illuminate\Http\Request;

class FrontendController extends Controller{
    public function index(){
        $kategori = Kategori::all();
        $artikel = Artikel::all();
        $slides = Slides::all();
        return view('frontend.home', [
            'category' => $kategori,
            'artikel' => $artikel,
            'slides' => $slides
        ]);
    }
    

    public function detail($slug) {
        $category = Kategori::all();
        $artikel = Artikel::where('slug', $slug)->first();

        return view('frontend.layouts.detail-artikel' ,[
            'artikel' => $artikel,
            'category' => $category,
        ]);
        
    }
    public function onKategori($id){
        $kategori = Kategori::find($id);
        if (!$kategori) {
            abort(404);
    }
    $artikel = $kategori->artikel;
    //dd($artikel);
    return view('frontend.onKategori', compact('artikel', 'kategori'));
    }


    public function __construct()
{
    $kategori = Kategori::all();
    view()->share('category', $kategori);
}

}
