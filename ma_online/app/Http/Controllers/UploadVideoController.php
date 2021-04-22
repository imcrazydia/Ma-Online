<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videos;

class UploadVideoController extends Controller
{

    public function index()
    {
        $videos = \App\Models\videos::all();
        return view('welcome',compact('videos'));
    }

    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'video_link' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'tags' => 'required|max:255',
        ]);

        $fullLink = $request->video_link;
        $videoToken = substr($fullLink,32);

        $videos = new videos;
        $videos->video_link = "https://www.youtube.com/embed/" . $videoToken;
        $videos->title = $request->title;
        $videos->description = $request->description;
        $videos->tags = $request->tags;
        $videos->views = 0;
        $videos->star_one = 0;
        $videos->star_two = 0;
        $videos->star_three = 0;
        $videos->star_four = 0;
        $videos->star_five = 0;
        $videos->user_id = $request->user()->id;

        $videos->save();
        return redirect()->route('dashboard')
        ->with('success','Upload van de video is succesvol.');
    }
}
