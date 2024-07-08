<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_profile()
    {
        $user = Auth::user();
        if ($user) {
            $items = User::where('id', Auth::id())->first();
            $posts = Post::where('user_id', Auth::id())->get();
            return view('user.profile', ['items' => $items, 'posts' => $posts]);
        } else {
            return redirect('/login');
        };
    }
}
