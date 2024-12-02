<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'id' => 'required|integer',
            'comment' => 'required|string'
        ]);

        $image_id = $request->input('id');
        $comment = $request->input('comment');
        $user_id = Auth::user()->id;

        Comment::create([
            'content' => $comment,
            'user_id' => $user_id,
            'image_id' => $image_id
        ]);

        return redirect()->back();
    }

    public function delete(Request $request) {
        $user = Auth::user();
        $comment = Comment::find($request->input('id'));
        if ($user)
            if ($comment->user_id== $user->id || $comment->image->user_id==$user->id)
            {
                $comment->delete();
                return redirect()->back();
            }
        return redirect()->back();
    }
}

