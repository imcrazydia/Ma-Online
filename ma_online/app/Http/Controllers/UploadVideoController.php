<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\videos;
use App\Models\tags;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Auth;

class UploadVideoController extends Controller
{

    public function index()
    {
        $videos = videos::all()->sortDesc();

        return view('welcome',compact('videos'));
    }

    public function youtubeCreate(Request $request)
    {

        $request->validate([
            'video_link' => 'required|url|max:255|in:youtube',
        ],
        [
            'video_link.required' => 'Video link is vereist.',
            'video_link.url' => 'Video link is niet geldig.',
            'video_link.in' => 'URL moet een youtube link zijn',
        ]);

        $url = filter_var($request->video_link, FILTER_SANITIZE_URL);
        $url = htmlspecialchars($url);

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

        $data->items['0']->snippet->title = Str::of($data->items['0']->snippet->title)->limit(95);
        $data->items['0']->snippet->description = Str::of($data->items['0']->snippet->description)->limit(3990);

        return view('upload', ['video' => $data]);
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'video_id' => 'required',
                'duration' => 'required',
                'title' => 'required|max:95',
                'description' => 'max:3990',
                'tags' => 'required|max:255',
            ],
            [
                'title.required' => 'Titel is vereist',
                'tags.required' => 'Tags zijn vereist',
            ]
        );

        $tags = htmlspecialchars($request->tags);
        $tags = strtolower($tags);
        $tags = str_replace(' ', '_', $tags);
        $tags = explode(",",$tags);

        $tagList = array();

        foreach($tags as $tag) {
            $filterdTag = ltrim($tag,'_');
            array_push($tagList,$filterdTag);
        }

        $filterdTag = implode(",", $tagList);
        $tags = explode(",", $filterdTag);

        $tagNameList = array(); // Array for tag_titles from used tags

        foreach ($tags as $tag) {
            $existingTag = DB::table('tags')->select("*")->where("tag_title", $tag)->exists();

            if ($existingTag) {
                DB::table('tags')->where("tag_title", $tag)->increment('amount_used');

                $existingTagTitle = DB::table('tags')->where("tag_title", $tag)->value('tag_title');
                array_push($tagNameList, $existingTagTitle);
            } else {
                $newTag = new tags;
                $newTag->tag_title = $tag;
                $newTag->amount_used = 1;

                $newTag->save();

                $tagTitle = $newTag->tag_title;
                array_push($tagNameList, $tagTitle);
            }
        }

        $tagNameList = implode(",", $tagNameList); // change tag_title array list to a string

        // Duration Formatting
        function covtime($yt){
            $yt=str_replace(['P','T'],'',$yt);
            foreach(['D','H','M','S'] as $a){
                $pos=strpos($yt,$a);
                if($pos!==false) ${$a}=substr($yt,0,$pos); else { ${$a}=0; continue; }
                $yt=substr($yt,$pos+1);
            }
            if($D>0){
                $M=str_pad($M,2,'0',STR_PAD_LEFT);
                $S=str_pad($S,2,'0',STR_PAD_LEFT);
                return ($H+(24*$D)).":$M:$S"; // add days to hours
            } elseif($H>0){
                $M=str_pad($M,2,'0',STR_PAD_LEFT);
                $S=str_pad($S,2,'0',STR_PAD_LEFT);
                return "$H:$M:$S";
            } else {
                $S=str_pad($S,2,'0',STR_PAD_LEFT);
                return "$M:$S";
            }
        }

        $videos = new videos;
        $videos->video_id = $request->video_id;
        $videos->title = htmlspecialchars($request->title);
        $videos->description = htmlspecialchars($request->description);
        $videos->tags = $tagNameList;
        $videos->duration = covtime($request->duration);
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
