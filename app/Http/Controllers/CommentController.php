<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $request -> validate([
            'id' => 'required|integer',
            'content'=> 'required|string'
        ]);

        $user_id = Auth::user()->id;
        $image_id=$request->input('id');
        $content = $request->input('content');

        Comment::cretae([
            'user_id'=> $user_id,
            'image_id'=> $image_id,
            'content'=>$content
        ]);

        return redirect()->back();

    }
}
