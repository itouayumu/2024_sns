<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Community;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\DB;

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
            $userInfo = UserInformation::where('user_id', $id)->first();

            return view('user.achieve', ['user' => $user,'userInfo' => $userInfo]);
        } else {
            return redirect('/login');
        }
    }
    public function achieve_action(Request $request){
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $path = $request->file('img')->store('public/images');
        } else {
            $path = null;
        }
        $item=User::where('id', Auth::id())->first();
        $array = json_decode($item, true); 
        $param = [
            'username' => $array['name'],
            'email' => $array['email'],
            'content' => $request->input('content'),
            'img' => basename($path),
        ];

        DB::table('_Application')->insert($param);


        return redirect('/user_profile');


    }
}