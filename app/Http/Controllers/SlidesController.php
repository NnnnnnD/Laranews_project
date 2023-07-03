<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slides;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $slides = Slides::all();
        return view('Dash.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dash.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'judul_slide' => 'required|min:4',
            'gambar_slide' => 'mimes:png,jpg,jpeg.gif,bmp',

        ]);
        if (!empty($request->file('gambar_slide'))) {
            $data = $request->all();
            $data  ['gambar_slide'] = $request->file('gambar_slide') -> store('slide');
            Slides::create($data);
            return redirect()->route('slides.index')->with('success', 'Data Berhasil Disimpan');

        } else {
            $data = $request->all();
            Slides::create($data);
            return redirect()->route('slide.index')->with('success', 'Data Berhasil Disimpan');

        }
        
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
        $slides= Slides::find($id);
        
        return view('Dash.slides.edit', compact('slides'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $this->validate($request, [
        'judul_slide' => 'required',
    ]);

    if (empty($request->file('gambar_slide'))) {
        $slides = Slides::find($id);
        $slides->update([
            'judul_slide' => $request->judul_slide,
            'link' => $request->link,
            'status' => $request->status,
        ]);
        return redirect()->route('slides.index')->with(['success'=>'Data Berhasil Di update']);

    } else {
        $slides = Slides::find($id);
        Storage::delete($slides->gambar_slide);
        $slides->update([
            'judul_slide' => $request->judul_slide,
            'link' => $request->link,
            'gambar_slide' => $request->file('gambar_slide')->store('slides'),
            'status' => $request->status,
        ]);
    }

    return redirect()->route('slides.index')->with(['success' => 'Data Berhasil Diupdate']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slide =Slides::find($id);
        if (!$slide) {
            return redirect()-> route('slides.index')->with('success','Data Tidak ada');

        } 
        Storage::delete($slide->gambar_slide);
        $slide->delete();
        return redirect()-> route('slides.index')->with('success','Data berhasil dihapus');

    }
}
