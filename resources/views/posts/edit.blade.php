@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8">
            <label for="title">Title:</label>
            <form action="/posts/{{$post->id}}" method="POST">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <input name="title" type="text" class="form-control input-lg" aria-describedby="basic-addon1"
                       value="{{$post->title}}">
                <br>
                <label for="slug">Slug:</label>
                <input name="slug" type="text" class="form-control input-lg" aria-describedby="basic-addon1"
                       value="{{$post->slug}}">
                <br>
                <div class="form-group">
                    <label for="comment">Content:</label>
                    <textarea class="form-control" rows="28" name="body" style="resize: none">{{$post->body}}</textarea>
                </div>
        </div>


        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{$post->created_at->formatLocalized('%d. %m. %Y')}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{$post->updated_at->formatLocalized('%d. %m. %Y')}}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <a href="/posts/{{$post->id}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection