@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="posts/create" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{(strlen($post->title)>=25) ? substr($post->body, 0, 25)."..." : $post->title}}</td>
                        <td>{{(strlen($post->body)>=90) ? substr($post->body, 0, 90)."..." : $post->body}}</td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="/posts/{{$post->id}}" class="btn btn-default">View </a> <a
                                    href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
@endsection