@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h2>Lorem ipsum dolor sit amet, consetetur sadipscing elitr</h2>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum</p>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button">Erfahre mehr</a></p>
    </div>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="" alt="...">
                    <div class="caption">
                        <h3>{{(strlen($post->title)>=25) ? substr($post->title, 0, 25)."..." : $post->title}}</h3>
                        <p>{{(strlen($post->body)>=70) ? substr($post->body, 0, 70)."..." : $post->body}}</p>
                        <p><a href="/video/{{$post->slug}}" class="btn btn-primary" role="button">Mehr</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
