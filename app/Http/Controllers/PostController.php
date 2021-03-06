<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Events\UserWasUnbanned;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Input;
use Purifier;
use Session;
use App\User;
use App\Events\UserWasBanned;

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
        $categories = Category::all();
        return view('posts/create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, array(
            'title' => 'required|max:150',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        //store in the database
        $post = new Post;

        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->slug = $request->input('slug');
        $post->category_id = $request->category_id;
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
        $categories = Category::all();
        return view('posts.edit')->with('post', $post)->withCategories($categories);
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
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }
        $posts->title = $request->input('title');
        $posts->body = Purifier::clean($request->input('body'));
        $posts->category_id = $request->input('category_id');
        $posts->slug = $request->input('slug');
        $posts->save();

        uploadPicture(Input::file('file_image'), $posts->id);
        uploadVideo(Input::file('file_0'), $posts->id);

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return redirect('/posts');
    }

    public function indexUser()
    {
        $users = User::all();
        return view('posts.users', [
            'users' => $users
        ]);
    }

    public function BanUser(User $user)
    {
        event(new UserWasBanned($user));
        Session::flash('success', 'Der Benutzer wurde erfolgreich gebannt!');
        return back();
    }

    public function UnbanUser(User $user)
    {
        event(new UserWasUnbanned($user));
        Session::flash('success', 'Der Benutzer wurde erfolgreich entbannt!');
        return back();
    }

    public function DeleteComment(Comment $comment)
    {
        $comment->comment="<i>".'Dieser Kommentar wurde von einem Administrator gelöscht'."</i>";
        $comment->save();
        Session::flash('success', 'Der Kommentar wurde erfolgreich gelöscht!');
        return back();
    }
}
