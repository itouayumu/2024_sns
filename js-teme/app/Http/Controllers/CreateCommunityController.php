<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Community;

class CreateCommunityController extends Controller
{
    public function community()
    {
        $user = Auth::user();
        if ($user) {
            $items = DB::table('genre')->get();
            $community = Community::where('delete_flag', false)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('user.community', ['items' => $items, 'community' => $community]);
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
            'icon' => basename($path),
            'reader' => Auth::id(),
            'public_flag' => $request->input('public_flag'),
        ];

        DB::table('community')->insert($param);


        return redirect('/');
    }

    public function join_community($id)
    {
        $user = Auth::user();
        if ($user) {
            $community = Community::with(['user', 'genre'])->find($id);
            return view('user.join_community', ['community' => $community]);
        } else {
            return redirect('/login');
        }
    }

    public function join_function(Request $request)
    {
        $param = [
            'community_id' => $request->input('community_id'),
            'user_id' => Auth::id(),
        ];

        DB::table('participant_community')->insert($param);


        return redirect('/');
    }
}
