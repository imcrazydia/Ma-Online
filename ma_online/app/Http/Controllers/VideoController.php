<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\videos;
use App\Models\Comment;
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
                ->where('tag_title', $tag)
                ->get('tag_title');

                foreach ($items as $item) {
                    array_push($tagNameList, $item);
                }
            }
        }

        $comments = Comment::where('video_id', '=', $id)
                            ->orderByDesc('updated_at')
                            ->get();
        $commentAmount = $comments->count();

        return view('video',compact('videos', 'tagNameList', 'uploader', 'id', 'comments'), [
            'commentAmount' => $comments->count()
        ]);
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
        $search = htmlspecialchars($search);

        $searchKey = strtolower($search);

        $tag_result = DB::table('tags')
        ->where('tag_title', 'LIKE', "%{$searchKey}%" )
        ->get('tag_title');

        if (!empty($tag_result[0])) {
    	    // Search in the title, body and tags columns from the videos table
            $results = videos::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('tags', 'LIKE', "%{$search}%")
            ->orderByDesc('updated_at')
            ->get();
        } else {
            // Search in the title and body columns from the videos table
            $results = videos::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orderByDesc('updated_at')
            ->get();
        }

        $searchCount = $results->count();

        // Return the search view with the results compacted
        if ($request->unknown === 'guest') {
            return view('guestSearch', compact('results', 'searchKey', 'searchCount'));
        } else {
            return view('search', compact('results', 'searchKey', 'searchCount'));
        }
    }

    public function tagSearch(Request $request)
    {
        // Get the search value from the request
        $searchKey = $request->input('search');

        $results = videos::query()
        ->where('tags', 'LIKE', "%{$searchKey}%")
        ->orderByDesc('updated_at')
        ->get();

        $searchCount = $results->count();

        // Return the search view with the results compacted
        return view('search', compact('results', 'searchKey', 'searchCount'));
    }
}
