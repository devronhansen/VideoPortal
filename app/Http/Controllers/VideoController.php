<?php
namespace App\Http\Controllers;

use App\Post;
use App\Category;

class VideoController extends Controller
{
    public function getAll()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return array_map(function ($post) {
            $post->body = strip_tags($post->body);
            return $post;
        }, $posts->all());
    }

    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate('8');
        return view('video.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function giveAjax($category_id)
    {
        $posts = Post::where('category_id', $category_id)
            ->orderBy('id', 'desc')
            ->get();

        return array_map(function ($post) {
            $post->body = strip_tags($post->body);
            return $post;
        }, $posts->all());

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