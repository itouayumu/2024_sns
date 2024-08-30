<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserInformation;
use App\Models\Community;
use App\Models\User;
use App\Models\user_achieve;

use Illuminate\Support\Facades\Session;

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
            $id = Auth::id();
            $user = User::where('id', $id)->first();
            $userInfo = UserInformation::where('user_id', $id)->first();
            $genreId = $userInfo->genre_id;
            $recommendation = UserInformation::where('genre_id', $genreId)
                ->where('user_id', '!=', $id)
                ->get();
            $recommendation_users = User::whereIn('id', $recommendation->pluck('user_id'))->get();
            Session::put('recommendation_users', $recommendation_users);
            $achievements = user_achieve::where('user_id', $id)->exists();
            $achieve_tag = ($achievements) ? true : false;
            Session::put('achieve_tag', $achieve_tag);
            return view('user.top', ['posts' => $posts, 'community' => $community, 'user' => $user, 'userInfo' => $userInfo]);
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
