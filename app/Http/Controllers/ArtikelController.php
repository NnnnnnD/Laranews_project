<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $artikel = Artikel::all();
        return view('Dash.artikel.index', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('Dash.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'judul' => 'required|min:4',
        ]);

        $data= $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['views'] = 0;
        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        } else {
            // Handle the case when the user is not authenticated, e.g., set a default value or show an error message
            // For example, you can set a default user ID like $data['user_id'] = 0;
            // or you can show an error message and redirect the user back to the login page
            return redirect()->route('login')->with(['error' => 'You need to login to create an Artikel.']);
        }
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');
        
        Artikel::create($data);
        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Tersimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
