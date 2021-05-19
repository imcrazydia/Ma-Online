<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index($id)
    {

        $videos = DB::table('videos')
        ->where('id', $id ) // Get video id from video parameter
        ->get();

        return view('video',compact('videos'));
    }
}
