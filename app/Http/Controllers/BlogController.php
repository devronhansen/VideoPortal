<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
        //fetch from the db based on slug
        $post = Post::where('slug', '=', $slug)->first();
        // return the view and pass in the post object
        return view('blog.single', ['post' => $post]);
    }
}
