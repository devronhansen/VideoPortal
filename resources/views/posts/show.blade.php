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
            <p>{{$post->body}}</p>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p>
                        <a href="{{--{{route('blog.single', $post->slug)}} --}}/video/{{$post->slug}}">{{url("/video/$post->slug")}}{{--{{route('blog.single', $post->slug)}}--}}</a>
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