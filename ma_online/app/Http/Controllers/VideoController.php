<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\videos;
use Auth;

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

    public function edit($id, $user)
    {
        if ($user == Auth::user()->id) {
            // Get video from id parameter
            $videos = DB::table('videos')
            ->where('id', $id ) // Get video id from video parameter
            ->get();

            return view('edit', compact('videos'));
        } else {
            return view('welcome');
        }
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:95',
                'description' => 'max:3990',
            ],
            [
                'title.required' => 'Titel is vereist',
                'tags.required' => 'Tags zijn vereist',
            ]
        );

        $videos = videos::find($request->id);
        $videos->title = htmlspecialchars($request->title);
        $videos->description = htmlspecialchars($request->description);
        $videos->save();
        return redirect()->route('profiel', ['user'=>Auth::user()->name])
        ->with('success','Video is succesvol bewerkt.');
    }

    public function delete($id, $user)
    {
        if ($user == Auth::user()->id) {
            // Get video from id parameter
            $videos = DB::table('videos')
            ->where('id', $id ) // Get video id from video parameter
            ->get();
            return view('delete', compact('videos'));
        } else {
            return view('welcome');
        }
    }

    public function destroy($id, $user)
    {
        if ($user == Auth::user()->id) {
            // Get video from id parameter
            $videos = DB::table('videos')
            ->where('id', $id ) // Get video id from video parameter
            ->get();

            foreach ($videos as $video) {
                $tags = explode(",", $video->tags);

                foreach ($tags as $tag) {
                    $items = DB::table('tags')
                    ->where('id', $tag)
                    ->get('tag_title');

                    foreach ($items as $item) {
                        $tag = DB::table('tags')->where("tag_title", $item->tag_title)->get();

                        foreach ($tag as $currentTag) {
                            DB::table('tags')->where("tag_title", $currentTag->tag_title)->decrement('amount_used');
                        }
                    }
                }

                DB::table('videos')->where('id', $id )->delete();

                return redirect()->route('profiel', ['user'=>Auth::user()->name]);
            }
        } else {
            return view('welcome');
        }
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        $tag_title = strtolower($search);

        $tags = DB::table('tags')
        ->where('tag_title', 'LIKE', "%{$tag_title}%" )
        ->get('id');

        if (!empty($tags[0])) {

            // Search in the title, body and tags columns from the videos table
            $results = videos::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('tags', 'LIKE', "%{$tags[0]->id}%")
            ->get();
        } else {
            // Search in the title and body columns from the videos table
            $results = videos::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        }

        // Return the search view with the results compacted
        return view('search', compact('results'));
    }
}
