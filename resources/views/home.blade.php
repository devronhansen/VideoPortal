@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/homepage.css">
@endsection

@section('jumbotron')
    <div class="jumbotron">
        <img src="/pictures/helga-home.png" width="15%" height="50%" class="pull-right" style="margin-right: 100px"/>
        <div class="col-md-offset-2" style="margin-top: 50px">
            <h2 class="jumbotron-text">Hey, ich bin Helga die Office Eule</h2>
            <p class="jumbotron-text">Wir haben in der IT da so ein neues Office Portal euch zugänglich gemacht.</br>
                Meine Aufgabe
                ist es euch zu
                zeigen, wie ihr schnell und einfach lernt damit umzugehen</p>
            <p><a class="btn btn-primary btn-lg " href="/about" role="button" style="margin-left: 70px">Erfahre mehr</a></p>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="thumbnail thumbnail-home">
                    <img src="/thumbnails/{{$post->id}}.jpg" alt="...">
                    <div class="caption">
                        <h3>{{(strlen($post->title)>=25) ? substr($post->title, 0, 25)."..." : $post->title}}</h3>
                        <p>{{ strlen(strip_tags($post->body))>=90 ? substr(strip_tags($post->body), 0, 90)."..." : strip_tags($post->body)}}</p>
                        <p><a href="/video/{{$post->slug}}" class="btn btn-primary place-bottom-left"
                              role="button">Mehr</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
