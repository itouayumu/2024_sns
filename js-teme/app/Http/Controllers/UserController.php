<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_profile()
    {
        $user = Auth::user();
        if ($user) {
            $id = Auth::id();
            $items = User::where('id', Auth::id())->first();
            $posts = Post::where('user_id', Auth::id())->get();
            $userInfo = UserInformation::where('user_id', $id)->first();
            return view('user.profile', ['items' => $items, 'posts' => $posts, 'userInfo' => $userInfo]);
        } else {
            return redirect('/login');
        };
    }

    public function other_profile($id)
    {
        $items = User::where('id', $id)->first();
        $posts = Post::where('user_id', $id)->get();
        $userInfo = UserInformation::where('user_id', $id)->first();
        return view('user.profile', ['items' => $items, 'posts' => $posts, 'userInfo' => $userInfo]);
    }
}
