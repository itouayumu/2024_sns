<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CreateCommunityController extends Controller
{
    public function community()
    {
        $user = Auth::user();
        if ($user) {
            $items = DB::table('genre')->get();
            return view('user.community', ['items' => $items]);
        } else {
            return redirect('/login');
        };
    }

    public function create_community(Request $request)
    {
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $path = $request->file('icon')->store('public/images');
        } else {
            $path = null;
        }

        $param = [
            'community_name' => $request->input('community_name'),
            'comu_explanation' => $request->input('comu_explanation'),
            'genre_id' => $request->input('genre'),
            'game' => $request->input('game'),
            'icon' => $path,
            'reader' => Auth::id(),
            'public_flag' => $request->input('public_flag'),
        ];

        DB::table('community')->insert($param);


        return redirect('/index');
    }
}
