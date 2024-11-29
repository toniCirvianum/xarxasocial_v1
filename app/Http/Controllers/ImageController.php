<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function index () {
        return view('upload');
    }

    public function store(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Image::create([
            'image_path' => $request->file('image')->store('images', 'public'),
            'user_id' => Auth::id()
        ]);
        return redirect()->back()->with('success', 'Image uploaded successfully');
    }

    public function myImages(){
        $images = Image::all();
        return $images;
        // return view ('dashboard', compact('images'));

    }
}
