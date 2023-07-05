<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'komentar_id' => 'required',
            'user_id' => 'required',
            'content' => 'required',
        ]);
    
        // Create a new reply using the Reply model
        $reply = new Reply();
        $reply->komentar_id = $request->komentar_id;
        $reply->user_id = $request->user_id;
        $reply->content = $request->content;
        $reply->save();
    
        // Redirect back to the artikel detail page
        return redirect()->back();
    }
}

