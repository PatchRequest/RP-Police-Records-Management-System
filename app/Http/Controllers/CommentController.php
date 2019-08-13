<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {

        /*
        $comments = Comment::all();

        return view('Comment.list',[
            'comments' => $comments
        ]);
*/

    }

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


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Comment $comment)
    {
        //
    }



}
