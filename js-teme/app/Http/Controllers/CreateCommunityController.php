<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Participant_Community;
use App\Models\UserInformation;



class CreateCommunityController extends Controller
{
    public function community()
    {
        $user = Auth::user();
        if ($user) {
            $login_id = Auth::id();
            $items = DB::table('genre')->get();
            $recommendation_community = Community::where('delete_flag', false)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(5)
                ->withCount('participants')
                ->get();
            $userInfo = UserInformation::where('user_id', $login_id)->first();

            return view('user.community', ['items' => $items, 'recommendation_community' => $recommendation_community, 'userInfo' => $userInfo]);
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

        $community = Community::create([
            'community_name' => $request->input('community_name'),
            'comu_explanation' => $request->input('comu_explanation'),
            'genre_id' => $request->input('genre'),
            'game' => $request->input('game'),
            'icon' => basename($path),
            'reader' => Auth::id(),
            'public_flag' => $request->input('public_flag'),
        ]);
        Participant_Community::create([
            'community_id' => $community->id,
            'user_id' => Auth::id(),
        ]);
        // DB::table('participant_community')->insert([
        //     'community_id' => $community->id,
        //     'user_id' => Auth::id(),
        // ]);

        return redirect('/');
    }

    public function join_community($id)
    {
        $user = Auth::user();
        if ($user) {
            $join_flag = false;
            $community = Community::with(['user', 'genre'])->find($id);
            $user_id = Auth::id();
            $join_community = Participant_Community::where('community_id', $id)
                ->where('user_id', $user_id)
                ->exists();
            if ($join_community) {
                $join_flag = true;
            }
            $recommendation_community = Community::where('delete_flag', false)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(5)
                ->withCount('participants')
                ->get();
            $userInfo = UserInformation::where('user_id', $user_id)->first();
            return view('user.join_community', ['community' => $community, 'join_flag' => $join_flag, 'userInfo' => $userInfo, 'recommendation_community' => $recommendation_community]);
        } else {
            return redirect('/login');
        }
    }

    public function join_function(Request $request)
    {
        $community_id = $request->input('community_id');
        $user_id = Auth::id();
        $exists = DB::table('participant_community')
            ->where('community_id', $community_id)
            ->where('user_id', $user_id)
            ->exists();

        if (!$exists) {
            DB::table('participant_community')->insert([
                'community_id' => $community_id,
                'user_id' => $user_id,
            ]);
            return redirect('/');
        } else {
            return redirect('/', ['message' => 'すでに参加しています。']);
        }
    }
}
