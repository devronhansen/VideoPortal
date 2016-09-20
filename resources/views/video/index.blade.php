@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h1>Alle Videos</h1>
            <br>
        </div>
        @foreach($posts as $post)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="" alt="...">
                    <div class="caption">
                        <h3>{{(strlen($post->title)>=28) ? substr($post->body, 0, 28)."..." : $post->title}}</h3>
                        <p>{{(strlen($post->body)>=100) ? substr($post->body, 0, 100)."..." : $post->body}}</p>
                        <p><a href="/video/{{$post->slug}}" class="btn btn-primary" role="button">Mehr</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {{ $posts->links() }}
    </div>
@endsection