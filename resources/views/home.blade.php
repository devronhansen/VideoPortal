@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <img src="/pictures/helga-home.png" width="15%" height="15%"
             {{--style="margin-left: 500px"--}} class="pull-right" style="margin-right: 100px"/>
        <h2 class="test">Hey, ich bin Helga die Office Eule</h2>
        <p class="test">Wir haben in der IT da so ein neues Office Portal euch zugänglich gemacht.</br> Meine Aufgabe ist es euch zu
            zeigen, wie ihr schnell und einfach lernt mit </br> Allem dort umzugehen!</p>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button">Erfahre mehr</a></p>
    </div>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="/thumbnails/{{$post->id}}.jpg" alt="...">
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
