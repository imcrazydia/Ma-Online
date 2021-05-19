<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Auth;

class ProfileController extends Controller
{
    public function index($user)
    {
        $userID = DB::table('users')
        ->where("name", $user)
        ->value('id');

        $videos = DB::table('videos')
        ->where('user_id', $userID ) // Get user id from user parameter
        ->get();

        return view('profiel',compact('videos'));
    }
}
