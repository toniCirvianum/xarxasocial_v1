<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {

        $isset_like = Like::where('user_id', Auth::user()->id)->where('image_id', $id)->count();
        $user = Auth::user();

        if ($isset_like == 0) {
            $like = Like::create([
                'user_id' => $user->id,
                'image_id' => $id
            ]);
            return "like fet";
        } else {
            $like = Like::where('user_id', Auth::user()->id)->where('image_id', $id)->first();
            if ($like) {
                $like->delete();
                return "like eliminat";
            } else {

                return "like no existeix";  
            }
        }
    }
}
