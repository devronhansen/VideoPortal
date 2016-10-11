<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Session;
use Purifier;

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
        if(strlen(Purifier::clean($request->comment)) >= 5){
            $comment = new Comment();
            $comment->comment = Purifier::clean($request->comment);
            $comment->approved = true;
            $comment->post()->associate($post_id);
            $comment->user()->associate(Auth::id());
            $comment->save();

            Session::flash('success', 'Kommentar wurde hinzugefügt');
        }
        else{
            Session::flash('error', 'Kommentar konnte nicht hinzugefügt werden');
        }
        return back();
    }
}
