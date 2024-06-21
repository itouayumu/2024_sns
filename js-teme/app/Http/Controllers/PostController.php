<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function post_action(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $path = $request->file('img')->store('public/images');
            $imgPath = Storage::url($path);
        } else {
            $imgPath = null;
        }

        $param = [
            'user_id' => $user_id,
            'content' => $request->content,
            'img' => $imgPath,
        ];

        DB::table('posts')->insert($param);
        return redirect('/index');
    }
}
