<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $videos = DB::table('videos')
        ->where('user_id', Auth::id() ) // Getting the Authenticated user id
        ->get();

        return view('profiel',compact('videos'));
    }
}
