<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, array(
            'title' => 'required|max:150',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));

        //store in the database
        $post = new Post;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = $request->input('slug');
        $post->save();

        uploadVideo(Input::file('file_0'), $post->id);
        uploadPicture(Input::file('file_image'), $post->id);
        Session::flash('success', 'The Post was successfully saved!');

        //redirect
        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function destroy($id)
    {
        deleteVideo($id);
        deletePicture($id);
        Post::find($id)->delete();
        Session::flash('success', "The post was successfully deleted");
        return redirect('/posts');
    }

    public function update(Request $request, Post $posts)
    {
        if ($request->input('slug') == $posts->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->slug = $request->input('slug');
        $posts->save();

        uploadPicture(Input::file('file_image'), $posts->id);
        uploadVideo(Input::file('file_0'), $posts->id);

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return redirect('/posts');
    }
}
