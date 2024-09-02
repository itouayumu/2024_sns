<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Community;
use App\Models\UserInformation;

class SearchController extends Controller
{
    public function search_result(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $search = $request->input('search');
        $kinds = $request->input('kinds');
        if (empty($search)) {
            return redirect()->back()->with('error', 'Search term cannot be empty.');
        }
        $userInfo = UserInformation::where('user_id', $id)->first();
        if ($kinds == 'user') {
            $user = User::where('name', 'like', "%$search%")->get();
            return view('user.search_result', ['user' => $user, 'userInfo' => $userInfo]);
        } else if ($kinds == 'post') {
            $posts = Post::where('content', 'like', "%$search%")->get();
            return view('user.search_result', ['posts' => $posts, 'userInfo' => $userInfo]);
        } else {
            $community = Community::where('community_name', 'like', "%$search%")->get();
            return view('user.search_result', ['community' => $community, 'userInfo' => $userInfo]);
        }
    }
}
