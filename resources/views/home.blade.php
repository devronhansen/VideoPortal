@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2>Lorem ipsum dolor sit amet, consetetur sadipscing elitr</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3>{{(strlen($post->title)>=28) ? substr($post->body, 0, 28)."..." : $post->title}}</h3>
                            <p>{{(strlen($post->body)>=100) ? substr($post->body, 0, 100)."..." : $post->body}}</p>
                            <p><a href="/blog/{{$post->slug}}" class="btn btn-primary" role="button">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
