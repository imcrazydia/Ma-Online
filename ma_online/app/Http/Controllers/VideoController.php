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

        $tags = DB::table('videos')
        ->where('id', $id )
        ->get('tags');

        $tagNameList = array();

        foreach ($tags as $tag) {
            $tests = explode(",", $tag->tags);

            foreach ($tests as $test) {
                $items = DB::table('tags')
                ->where('id', $test )
                ->get('tag_title');

                foreach ($items as $item) {
                    array_push($tagNameList, $item);
                }
            }
        }

        return view('video',compact('videos', 'tagNameList'));
    }
}
