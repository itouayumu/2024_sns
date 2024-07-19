<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adomincontroller extends Controller
{
    public function adomin()
    {
        return view('adomin.top');
    }
    public function achieve()
    {
        return view('adomin.achieve');
    }
    
}
