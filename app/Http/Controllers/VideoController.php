<?php
namespace App\Http\Controllers;
use App\Post;

class VideoController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate('8');
        return view('video.index', [
            'posts' => $posts
        ]);
    }

    public function welcome()
    {
        $posts = Post::orderBy('id', 'desc')->paginate('3');
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function getSingle($slug)
    {
        //fetch from the db based on slug
        $post = Post::where('slug', '=', $slug)->first();
        // return the view and pass in the post object
        return view('video.single', ['post' => $post]);
    }
}