<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserInformation;
use App\Models\Community;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $id = Auth::id();
            $posts = Post::where('delete_flag', false)
                ->with('user', 'userInfo')
                ->orderBy('created_at', 'desc')
                ->get();
            $community = Community::where('delete_flag', false)
                ->orderBy('created_at', 'desc')
                ->get();
            $icon = UserInformation::where('user_id', $id)
                ->first();
            return view('user.top', ['posts' => $posts, 'community' => $community, 'icon' => $icon]);
        } else {
            return redirect('/login');
        }
    }
    public function latestPosts()
    {
        $posts = Post::where('delete_flag', false)
            ->with('user', 'userInfo')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($posts);
    }
}
