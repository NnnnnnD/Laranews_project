<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $data['user_id'] = Auth::id();
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        
        return view('Dash.artikel.edit', [
            'artikel' => $artikel,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_artikel'))){
            $artikel = Artikel::find($id);
            $artikel->Update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request ->kategori_id,
                'is_active' => $request ->is_active,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('artikel.index')->with(['success'=>'Data Berhasil Di update']);
        }else{
            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->Update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request ->kategori_id,
                'is_active' => $request ->is_active,
                'user_id' => Auth::id(),
                'gambar_artikel' =>$request->file('gambar_artikel')->store('artikel'),
            ]);
        return redirect()->route('artikel.index')->with(['success'=>'Data Berhasil Di update']);
        }

        
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $artikel = Artikel::find($id);
        Storage::delete($artikel->gambar_artikel);
        $artikel -> delete();

        return redirect() -> route('artikel.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
