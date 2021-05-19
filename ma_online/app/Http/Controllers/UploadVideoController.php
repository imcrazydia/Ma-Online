<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videos;
use App\Models\tags;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;

class UploadVideoController extends Controller
{

    public function index()
    {
        // $videos = \App\Models\videos::all();
        // return view('welcome',compact('videos'));
        return view('welcome');
    }

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

        $data->items['0']->snippet->title = Str::of($data->items['0']->snippet->title)->limit(240);
        $data->items['0']->snippet->description = Str::of($data->items['0']->snippet->description)->limit(240);

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

        $tags = strtolower($request->tags);
        $tags = str_replace(' ', '_', $tags);
        $tags = explode(",",$tags);

        $tagList = array();

        foreach($tags as $tag) {
            $filterdTag = ltrim($tag,'_');
            array_push($tagList,$filterdTag);
        }

        $filterdTag = implode(",", $tagList);
        $tags = explode(",", $filterdTag);

        $tagNameList = array(); // Array for IDs from used tags

        foreach ($tags as $tag) {
            $existingTag = DB::table('tags')->select("*")->where("tag_title", $tag)->exists();

            if ($existingTag) {
                DB::table('tags')->where("tag_title", $tag)->increment('amount_used');

                $existingTagID = DB::table('tags')->where("tag_title", $tag)->value('id');
                array_push($tagNameList, $existingTagID);
            } else {
                $newTag = new tags;
                $newTag->tag_title = $tag;
                $newTag->amount_used = 1;

                $newTag->save();

                $tagID = $newTag->id;
                array_push($tagNameList, $tagID);
            }
        }

        $tagNameList = implode(",", $tagNameList); // change ID array list to a string

        $videos = new videos;
        $videos->video_id = $request->video_id;
        $videos->title = $request->title;
        $videos->description = $request->description;
        $videos->tags = $tagNameList;
        $videos->views = 0;
        $videos->star_one = 0;
        $videos->star_two = 0;
        $videos->star_three = 0;
        $videos->star_four = 0;
        $videos->star_five = 0;
        $videos->user_id = $request->user()->id;

        $videos->save();

        return redirect()->route('profiel', ['user'=>Auth::user()->name])
        ->with('success','Upload van de video is succesvol.');
    }
}
