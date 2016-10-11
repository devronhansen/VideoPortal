@extends('layouts.app')


@section('content')
    <div class="col-md-8">
        <h1>{{$post->title}}</h1>
        <br>
        <div align="left" class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" controls>
                <source src="/files/{{$post->id}}.mp4" type="video/mp4">
            </video>
        </div>
        <hr>
        <p>{!! $post->body !!}</p>
        <div id="backend-comments" style="margin-top: 50px; margin-bottom: 100px">
            <h3>Comments
                <small>{{$post->comments()->count()}} total</small>
            </h3>

            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->user->name}}</td>
                        <td>{{ $comment->user->email}}</td>
                        <td>{{ $comment->comment}}</td>
                        <td>
                            <a href="/comments/delete/{{$comment->id}}" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <label>Url:</label>
                <p>
                    <a href="/video/{{$post->slug}}">{{url("/video/$post->slug")}}{{--{{route('blog.single', $post->slug)}}--}}</a>
                </p>
            </dl>
            <dl class="dl-horizontal">
                <label>Kategorie:</label>
                <p>{{($post->category->name)}}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>Erstellt am:</label>
                <p>{{$post->created_at->formatLocalized('%d.%m.%Y')}}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>Bearbeitet am:</label>
                <p>{{$post->updated_at->formatLocalized('%d.%m.%Y')}}</p>
            </dl>
            <hr>

            <div class="row">
                <div class="col-sm-6">
                    <form action="{{$post->id}}/edit" method="GET">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary btn-block">Bearbeiten</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="{{$post->id}}" method="POST">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-block">Löschen</button>
                    </form>
                </div>

                <div class="col-sm-12">
                    <a href="/posts" class="btn btn-block btn-default" style="margin-top: 15px"> << Zurück zu allen
                        Posts</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection