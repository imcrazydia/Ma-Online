<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\videos;
use App\Models\User;
use App\Models\Role;
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

        //TODO
        // - Maak een button die alle lege tags verwijderd (Deze button moet laten zien hoeveel lege tags er zijn)

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

    public function editUser($id)
    {
        $userData = DB::table('users')
        ->where('id', $id)
        ->get();

        $roles = Role::all();

        return view('editUser',compact('userData', 'roles'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = htmlspecialchars($request->role_id);
        $user->save();
        return redirect()->route('showUsers')
        ->with('success','De gebruikers rol is aangepast.');
    }


    public function showTags()
    {
        $tags = tags::orderBy('amount_used', 'desc')->get();

        $emptyTags = tags::query()
        ->where('amount_used', '=', 0)
        ->get();

        $emptyTags = $emptyTags->count();

        return view('tagList',compact('tags', 'emptyTags'));
    }

    public function deleteTag($id)
    {
        $tags = DB::table('tags')
        ->where('id', $id )
        ->get();

        $videos = videos::all();

        foreach ($videos as $video) {
            $videoTags = explode(",", $video->tags);
            $index = array_search($tags[0]->tag_title, $videoTags);

            if ($index !== false) {
                $new = array_diff($videoTags, array($tags[0]->tag_title));
                $updatedTags = implode(",", $new);

                videos::where('id', '=', $video->id)
                ->update(['tags' => $updatedTags]);

                DB::table('tags')->where('tag_title', $tags[0]->tag_title )->delete();
            }
        }

        return redirect()->route('showTags')
        ->with('success','De tag is zonder problemen verwijderd.');
    }

    public function deleteEmptyTags()
    {
        $emptyTags = tags::query()
        ->where('amount_used', '=', 0)
        ->get();

        foreach ($emptyTags as $emptyTag) {
            DB::table('tags')->where('tag_title', $emptyTag->tag_title)->delete();
        }

        return redirect()->route('showTags')
        ->with('success','De lege tags zijn zonder problemen verwijderd.');
    }
}
