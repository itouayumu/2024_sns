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
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $path = $request->file('img')->store('public/images');
        } else {
            $path = null;
        }

        $param = [
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'img' => $path,
        ];

        DB::table('post')->insert($param);


        return redirect('/index');
    }
}
