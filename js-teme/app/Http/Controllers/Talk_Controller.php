<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Talk_Controller extends Controller
{
    public function talk()
    {
        $user = Auth::user();
        if ($user) {
            $items = DB::table('genre')->get();
            return view('user.community', ['items' => $items]);
        } else {
            return redirect('/login');
        };
    }
}
