<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post_id)
    {
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000'
        ));


        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post_id);
        $comment->user()->associate(Auth::id());
        $comment->save();

        Session::flash('success', 'Kommentar wurde hinzugefügt');

        return back();
    }
}
