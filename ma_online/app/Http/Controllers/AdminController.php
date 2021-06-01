<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\videos;
use App\Models\User;
use App\Models\tags;

class AdminController extends Controller
{
    public function showVideos()
    {
        $videos = videos::all()->sortDesc();

        return view('videoList',compact('videos'));
    }

    public function deleteVideo($id)
    {
        // Get video from id parameter
        $videos = DB::table('videos')
        ->where('id', $id ) // Get video id from video parameter
        ->get();

        foreach ($videos as $video) {
            $tags = explode(",", $video->tags);

            foreach ($tags as $tag) {
                $items = DB::table('tags')
                ->where('tag_title', $tag)
                ->get('tag_title');

                foreach ($items as $item) {
                    $tag = DB::table('tags')->where("tag_title", $item->tag_title)->get();

                    foreach ($tag as $currentTag) {
                        DB::table('tags')->where("tag_title", $currentTag->tag_title)->decrement('amount_used');
                    }
                }
            }

            DB::table('videos')->where('id', $id )->delete();

            return redirect()->route('showVideos')
            ->with('success','De video is zonder problemen verwijderd.');
        }
    }

    public function showUsers()
    {
        $users = User::all()->sortDesc();

        return view('userList',compact('users'));
    }

    public function deleteUser($id)
    {
        // Get video from id parameter
        $videos = DB::table('videos')
        ->where('user_id', $id ) // Get video id from video parameter
        ->get();

        foreach ($videos as $video) {
            $tags = explode(",", $video->tags);

            foreach ($tags as $tag) {
                $items = DB::table('tags')
                ->where('tag_title', $tag)
                ->get('tag_title');

                foreach ($items as $item) {
                    $tag = DB::table('tags')->where("tag_title", $item->tag_title)->get();

                    foreach ($tag as $currentTag) {
                        DB::table('tags')->where("tag_title", $currentTag->tag_title)->decrement('amount_used');
                    }
                }
            }

            DB::table('videos')->where('user_id', $id )->delete();
            DB::table('users')->where('id', $id )->delete();

            return redirect()->route('showUsers')
            ->with('success','De gebruiker is zonder problemen verwijderd.');
        }
    }

    // public function showTags()
    // {
    //     $tags = tags::all()->sortDesc();

    //     return view('tagList',compact('tags'));
    // }
}
