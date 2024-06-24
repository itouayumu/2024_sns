<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $user_id = $user->id;
            return view('user.top', ['user_id' => $user_id]);
        } else {
            return redirect('/login');
        }
    }

    public function post()
    {
        $user = Auth::user();
        $user_id = $user->id;
        return view('user.post', ['user_id' => $user_id]);
    }
}
