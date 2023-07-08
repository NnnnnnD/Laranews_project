<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\komentar;
use App\Models\Kategori;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $artikel = Artikel::all();
        $komentar = Komentar::all();
        $user = User::all();
        return view('komentar.index', [
            'komentar' => $komentar,
            'artikel' => $artikel,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data komentar
    $request->validate([
        'artikel_id' => 'required|exists:artikel,id',
        'user_id' => 'required|exists:users,id',
        'content' => 'required|string',
    ]);

    // Simpan komentar ke dalam tabel
    komentar::create([
        'artikel_id' => $request->artikel_id,
        'user_id' => $request->user_id,
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Reply posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komentar = komentar::find($id);
        $komentar -> delete();

        return redirect() -> route('komentar.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
