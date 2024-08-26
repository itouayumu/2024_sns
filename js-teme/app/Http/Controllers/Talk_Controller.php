<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Participant_Community;
use App\Models\CommunityChat;
use App\Models\User;
use App\Models\UserInformation;

class Talk_Controller extends Controller
{
    public function talk()
    {
        $user = Auth::user();
        if ($user) {
            $id = Auth::id();
            $items = Participant_Community::where('user_id', $id)->with(['community'])->get();
            $user = User::where('id', $id)->first();
            $userInfo = UserInformation::where('user_id', $id)->first();
            return view('user.talk', ['items' => $items, 'user' => $user,'userInfo' => $userInfo]);
        } else {
            return redirect('/login');
        }
    }
    public function getMessages($communityId)
    {
        $messages = CommunityChat::where('community_id', $communityId)->with('user')->get();
        return response()->json($messages);
    }

    public function postMessage(Request $request, $communityId)
    {
        $message = CommunityChat::create([
            'user_id' => Auth::id(),
            'community_id' => $communityId,
            'content' => $request->input('content'),
        ]);

        return response()->json($message->load('user'));
    }
}
