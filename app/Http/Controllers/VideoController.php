<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
class VideoController extends Controller
{
    public function getAll()
    {
        return Post::all();
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
       return Post::where('category_id', $category_id)
           ->orderBy('id', 'desc')
           ->get();
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