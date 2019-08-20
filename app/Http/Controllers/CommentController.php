<?php

namespace App\Http\Controllers;

use App\Comment;

class CommentController extends Controller
{

    public function create()
    {
        if(!(request()->has('receiver_id')) ){
            return back();
        }


    }

    public function store()
    {
        $validated = request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'karma' => 'required'
        ]);

        $comment = new Comment;
        $comment->karma = $validated['karma'];
        $comment->title = $validated['title'];
        $comment->content = $validated['content'];
        $comment->receiver_id = $validated['user_id'];
        $comment->creator_id = auth()->user()->id;



        $comment->save();
        return back();
    }

}
