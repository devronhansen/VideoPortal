@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p class="lead">{{$post->body}}</p>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{route('blog.single', $post->slug)}}">{{route('blog.single', $post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{$post->created_at->formatLocalized('%d. %m. %Y')}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{$post->updated_at->formatLocalized('%d. %m. %Y')}}</p>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{$post->id}}/edit" method="GET">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{$post->id}}" method="POST">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </div>

                    <div class="col-sm-12">
                        <a href="/posts" class="btn btn-block btn-default" style="margin-top: 15px"> << Back to All
                            Posts</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection