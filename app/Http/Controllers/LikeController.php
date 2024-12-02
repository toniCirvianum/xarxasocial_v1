<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // public function like($id) {

    //     $isset_like= Like ::where('user_id',Auth::user()->id)->where('image_id',$id)->count();
    //     $user = Auth::user();
           
    //     if ($isset_like == 0) {
    //         $like = Like::create([
    //             'user_id' =>$user->id,
    //             'image_id' => $id
    //         ]);
    //         echo "Like Afegit";
    //     } else {
    //         $like= Like ::where('user_id',Auth::user()->id)->where('image_id',$id)->first();
    //         $like -> delete();
    //         echo "like eliminat";
            
    //     }

    // }

    public function like($id)
    {

        $isset_like = Like::where('user_id', Auth::user()->id)->where('image_id', $id)->count();
        if ($isset_like == 0) {
            $user = Auth::user();
            $like=Like::create([
                'user_id' => $user->id,
                'image_id' => $id
            ]);
            return response()->json([
                'like'=>$like,
                'message'=>'Like fet'
            ]);
        } else {

            return response()->json([
                'message'=>'El like ja existeix'
            ]);
        }

        
    }

    public function dislike($id)
    {
        $like = Like::where('user_id', Auth::user()->id)->where('image_id', $id)->first();

        if ($like) {
            $like->delete();
            return response()->json([
                'like'=>Like::find($id),
                'message'=>'Like eliminat'
            ]);
        } else {

            return response()->json([
                'message'=>'El like no existeix'
            ]);
        }

    }
}
