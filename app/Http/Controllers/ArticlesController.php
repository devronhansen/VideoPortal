<?php
namespace App\Http\Controllers;
use App\Post;

class ArticlesController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate('8');
        return view('articles.index', [
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
}