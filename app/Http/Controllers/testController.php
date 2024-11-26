<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;

class testController extends Controller
{
    public function index() {
        $images = Image::all();
        return view ('images',compact('images'));
    }

    public function users() {
        $users = User::all();
        return view ('users',compact('users'));
    }
}



