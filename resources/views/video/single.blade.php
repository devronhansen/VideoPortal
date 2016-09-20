@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$post->title}}</h1>
            <br>
            <div align="center" class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item" controls>
                    <source src="/files/{{$post->id}}.mp4" type="video/mp4">
                </video>
            </div>
            <hr>
            <p>{{$post->body}}</p>
        </div>
    </div>
@endsection