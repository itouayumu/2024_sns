<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Genre;


class adomincontroller extends Controller
{
    public function adomin()
    {
        return view('adomin.top');
    }
    public function achieve()
    {
        $items = DB::table('_application')->where('delete_flag', false)->get();
        return view('adomin.achieve', ['items' => $items]);
    }
    public function aplication(Request $request)
    {
        $id = $request->id;
        $item = DB::table('_application')->where('id', $id)->first();

        return view('adomin.achive_deteles', ['item' => $item, 'id' => $id]);
    }
    public function achive_result_true(Request $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $path = null;
        $param = [
            'achieve_name' => $request->input('name'),
            'game' => $request->input('game_name'),
            'detail' => $request->input('detels'),
            'img' => $path,
        ];
        DB::table('achieve_tag')->insert($param);
        $tag_id = DB::table('achieve_tag')->select('id')->where('achieve_name', $name)->first();
        $user = User::select('id')->where('name', $username)->first();
        $param2 = [
            'user_id' => $user->id,
            'achieve_id' => $tag_id->id,
        ];
        DB::table('user_achieve')->insert($param2);
        $apid = $request->input('apid');
        DB::table('_application')->update(['delete_flag' => true]);
        return redirect('/achieve');
    }
    public function achive_result_false(Request $request)
    {
        $apid = $request->input('apid');
        DB::table('_application')->update(['delete_flag' => true]);
        return redirect('/achieve');
    }
    public function genre()
    {
        return view('adomin.insert');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = new Genre();
        $genre->name = $request->input('name');
        $genre->save();

        return redirect("/adomin");
    }
}
