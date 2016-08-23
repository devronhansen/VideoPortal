<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Session;

class PostController extends Controller
{
    public function create()
    {
        return view('posts/create');
    }

    public function store(Request $request)
    {
         //Validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required'
        ));

        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'The Post was successfully saved!');

        //redirect
        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        return view('posts.show');
    }


}
