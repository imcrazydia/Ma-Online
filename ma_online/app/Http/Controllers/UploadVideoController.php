<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videos;

class UploadVideoController extends Controller
{

    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'video_link' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        $videos = new videos;
        $videos->video_link = $request->video_link;
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
        ->with('success','Contact created successfully.');
    }
}
