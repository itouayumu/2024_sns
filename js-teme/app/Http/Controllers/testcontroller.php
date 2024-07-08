<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class testcontroller extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function post()
    {
        $user = Auth::user();
        $user_id = $user->id;
        return view('user.post', ['user_id' => $user_id]);
    }
    public function tork(){
        return view('user.tork');
    }
}
