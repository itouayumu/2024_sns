<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Participant_Community;

class Talk_Controller extends Controller
{
    public function talk()
    {
        $user = Auth::user();
        if ($user) {
            $id = Auth::id();
            $items = Participant_Community::where('user_id', $id)->with(['community'])->get();
            return view('user.talk', ['items' => $items]);
        } else {
            return redirect('/login');
        }
    }
}
