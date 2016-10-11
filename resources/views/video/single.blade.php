@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/comment.css">
@endsection

@section('content')
    <div class="row">

        <h1>{{$post->title}}</h1>
        <br>
        <div align="center" class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" controls>
                <source src="/files/{{$post->id}}.mp4" type="video/mp4">
            </video>
        </div>
        <br>
        <p style="margin-bottom:50px">{!!$post->body!!}</p>

    </div>
    <hr>
    @if(Auth::check())
        <div class="row">
            <div id="comment-form" style="margin-top:50px;">
                <form action="/comments/{{$post->id}}" method="POST">
                    {{csrf_field()}}
                    <label for="comment">Kommentar:</label>
                    <textarea class="form-control" rows="5" name="comment" style="resize: none"></textarea>
                    <button type="submit" class="btn btn-primary col-md-offset-10 pull-right" style="margin-top: 15px;">Kommentieren
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="row">

            <h4 class="nologin">Du musst angemeldet sein um einen Kommentar zu schreiben</h4>
        </div>

    @endif
    <div class="row">

        <h3 class="comments-title"><span
                    class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
        @foreach($post->comments->reverse() as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->user->email))) . "?s=50&d=mm" }}"
                         class="author-image">
                    <div class="author-name">
                        <h4>{{$comment->user->name}}</h4>
                        <p class="author-time">{{$comment->created_at->formatLocalized('%d.%m.%Y')}}</p>
                    </div>
                </div>
                <div class="comment-content">
                    {!!$comment->comment !!}
                </div>
            </div>
        @endforeach
    </div>

    <br><br>
@endsection
