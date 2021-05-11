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

    // public function create()
    // {
    //     return view('upload.create');
    // }

    public function youtubeCreate(Request $request)
    {
        $request->validate([
            'video_link' => 'required|max:255',
        ]);

        $url = $request->video_link;

        function getYoutubeVideoID($url){
            $queryString = parse_url($url,PHP_URL_QUERY);
            parse_str($queryString,$params);

            if(isset($params['v']) && strlen($params['v'])>0){
                return $params['v'];
            }else{
                return "Wrong youtube video url";
            }
        }

        $api_key = "AIzaSyBy-a1LQE-mCxhgRSVKebbKdkgaAaaMOFI";
        $api_ur='https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.getYoutubeVideoID($url).'&key='.$api_key;

        $data = json_decode(file_get_contents($api_ur));

        return view('upload', ['video' => $data]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'tags' => 'required|max:255',
        ]);

        $videos = new videos;
        $videos->video_id = $request->video_id;
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
