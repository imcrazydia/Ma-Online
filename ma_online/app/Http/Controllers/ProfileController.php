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

//        $videos = DB::table('videos')
//        ->where('user_id', $userID ) // Get user id from user parameter
//        ->get();

        $videos = DB::table('videos')
            ->select('videos.id','videos.video_id', 'videos.title' , 'videos.description', 'videos.tags', 'videos.duration', 'videos.star_one', 'videos.star_two', 'videos.star_three', 'videos.star_four', 'videos.star_five', 'videos.user_id', 'videos.created_at', 'videos.updated_at', 'users.name')
            ->join('users', 'users.id', '=', 'videos.user_id')
            ->where('videos.user_id', $userID ) // Get user id from user parameter
            ->get();

        return view('profiel',compact('videos'));
    }
}
