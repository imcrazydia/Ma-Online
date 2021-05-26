<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index($id)
    {
        // Get video from id parameter
        $videos = DB::table('videos')
        ->where('id', $id ) // Get video id from video parameter
        ->get();


        $tagNameList = array();

        foreach ($videos as $video) {

            // Get uploaders name from video id parameter
            $videoUploader = DB::table('users')
            ->where('id', $video->user_id )
            ->get('name');

            foreach ($videoUploader as $uploader) {
                $uploader = $uploader->name;
            }

            $tags = explode(",", $video->tags);

            foreach ($tags as $tag) {
                $items = DB::table('tags')
                ->where('id', $tag)
                ->get('tag_title');

                foreach ($items as $item) {
                    array_push($tagNameList, $item);
                }
            }
        }

        return view('video',compact('videos', 'tagNameList', 'uploader'));
    }
}
