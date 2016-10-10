<?php
namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

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

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $posts = DB::table('posts')->where('title', 'LIKE', '%' . $request->search . '%')->get();
            if ($posts) {
                foreach ($posts as $post) {
                    $title = (strlen($post->title) >= 18) ? substr($post->title, 0, 18) . "..." : $post->title;
                    $body = (strip_tags(strlen($post->body) >= 130)) ? strip_tags(substr($post->body, 0, 130)) . "..." : strip_tags($post->body);

                    $output .= '<div class="col-md-3"><div class="thumbnail"><img src="/thumbnails/' . $post->id . '.jpg" alt="..."><div class="caption">' .
                        '<h3>' . $title . '</h3>' .
                        '<p>' . $body . '</p>' .
                        '</p><p><a href="/video/' . $post->slug . '" class="btn btn-primary place-bottom-left" role="button">Mehr</a></p></div></div></div>';
                }
                return Response($output);
            }
        }
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