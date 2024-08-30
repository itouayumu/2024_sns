<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\UserInformation;
use App\Models\follow;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_profile()
    {
        $user = Auth::user();
        if ($user) {
            $id = Auth::id();
            $other_flag = false;
            $items = User::where('id', Auth::id())->first();
            $posts = Post::where('user_id', Auth::id())->get();
            $userInfo = UserInformation::where('user_id', $id)->first();
            $follow_count = follow::where('follower_id', $id)->count();
            $follower_count = follow::where('follow_id', $id)->count();
            return view('user.profile', ['items' => $items, 'posts' => $posts, 'userInfo' => $userInfo, 'follower_count' => $follower_count, 'follow_count' => $follow_count], compact('other_flag'));
        } else {
            return redirect('/login');
        };
    }

    public function other_profile($id)
    {
        $login_id = Auth::id();
        $other_flag = true;
        $items = User::where('id', $id)->first();
        $posts = Post::where('user_id', $id)->get();
        $search_info = UserInformation::where('user_id', $id)->first();
        $userInfo = UserInformation::where('user_id', $login_id)->first();
        $other_flag = ($login_id == $id) ? false : true;
        $exists = DB::table('follow')
            ->where('follow_id', $login_id)
            ->where('follower_id', $id)
            ->exists();
        $follow_flag = (!$exists) ? true : false;
        $follow_count = follow::where('follower_id', $id)->count();
        $follower_count = follow::where('follow_id', $id)->count();
        return view('user.profile', ['items' => $items, 'posts' => $posts, 'userInfo' => $userInfo, 'search_info' => $search_info, 'follower_count' => $follower_count, 'follow_count' => $follow_count], compact('other_flag', 'follow_flag'));
    }

    public function follow_function($id)
    {
        $login_id = Auth::id();

        if ($login_id != $id) {
            $exists = DB::table('follow')
                ->where('follow_id', $login_id)
                ->where('follower_id', $id)
                ->exists();
            if (!$exists) {
                $param = [
                    'follow_id' => $login_id,
                    'follower_id' => $id,
                ];
                DB::table('follow')->insert($param);
                return redirect("/other_profile/$id");
            }
        }
    }
    public function follow_cancellation($id)
    {
        $login_id = Auth::id();

        if ($login_id != $id) {
            $exists = DB::table('follow')
                ->where('follow_id', $login_id)
                ->where('follower_id', $id)
                ->exists();

            if ($exists) {
                DB::table('follow')
                    ->where('follow_id', $login_id)
                    ->where('follower_id', $id)
                    ->delete();

                return redirect("/other_profile/$id");
            }
        }
    }
}
