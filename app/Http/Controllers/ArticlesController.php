<?php
namespace App\Http\Controllers;
use App\Post;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function welcome()
    {
        $posts = Post::orderBy('id', 'desc')->paginate('3');
        return view('home', [
            'posts' => $posts
        ]);
    }
}