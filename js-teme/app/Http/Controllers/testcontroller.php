<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class testcontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $posts = Post::where('delete_flag', false)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('user.top', ['posts' => $posts]);
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
