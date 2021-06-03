<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store($id, Request $request)
    {
        $request->validate([
            'text' => [
                'required',
                'string',
                'max:500',
            ],
        ],
        [
            'text.required' => 'Om een comment te plaatsen mag dit veld niet leeg zijn.',
            'text.max' => 'De comment mag maar 500 characters bevatten.',
        ]);

        $comment = new Comment();
        $comment->video_id = $id;
        $comment->author   = $request->author;
        $comment->text     = htmlspecialchars($request->text);
        $comment->save();

        // return redirect()->route('video', ['id'=>$id]);
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
