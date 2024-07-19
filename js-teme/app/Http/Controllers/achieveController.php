<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Community;
use App\Models\User;
use App\Models\UserInformation;

class achieveController extends Controller
{
    public function achieve()
    {
        $user = Auth::user();
        if ($user) {
            $posts = Post::where('delete_flag', false)
                ->with('user', 'userInfo')
                ->orderBy('created_at', 'desc')
                ->get();
            $community = Community::where('delete_flag', false)
            ->orderBy('created_at', 'desc')
            ->get();
            $id = Auth::id();
            $user = User::where('id', $id)->first();

            return view('user.achieve', ['user' => $user]);
        } else {
            return redirect('/login');
        }
    }
}