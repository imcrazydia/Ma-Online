<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videos;
use Illuminate\Support\Str;

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
            'video_link' => 'required|url|max:255',
        ],
        [
            'video_link.required' => 'Video link is vereist.',
            'video_link.url' => 'Video link is niet geldig.',
        ]);

        $url = filter_var($request->video_link, FILTER_SANITIZE_URL);

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

        $data->items['0']->snippet->title = Str::of($data->items['0']->snippet->title)->limit(245);
        $data->items['0']->snippet->description = Str::of($data->items['0']->snippet->description)->limit(245);

        return view('upload', ['video' => $data]);
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'video_id' => 'required',
                'title' => 'required|max:255',
                'description' => 'max:255',
                'tags' => 'required|max:255',
            ],
            [
                'title.required' => 'Titel is vereist',
                'tags.required' => 'Tags zijn vereist',
            ]
        );

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

        return redirect()->route('profiel')
        ->with('success','Upload van de video is succesvol.');
    }
}
