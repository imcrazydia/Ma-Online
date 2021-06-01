<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Auth;

class ProfileController extends Controller
{
    public function index($user)
    {
        $userData = DB::table('users')
        ->where("name", $user)
        ->get();

        $profilePic = $userData[0]->profile_photo_path; // Get profile picture

        $videos = DB::table('videos')
        ->select('*')
        ->where('user_id', $userData[0]->id) // Get user id from user parameter
        ->orderByDesc('updated_at')
        ->get();

        return view('profiel',compact('videos', 'user', 'profilePic'));
    }
}
