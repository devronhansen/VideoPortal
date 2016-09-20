@extends('layouts.app')


@section('content')
    <div class="row">
        <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            <div class="col-md-8">
                <label for="title">Titel:</label>
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <input name="title" type="text" class="form-control input-lg" aria-describedby="basic-addon1"
                       value="{{$post->title}}">
                <br>
                <label for="slug">Slug:</label>
                <input name="slug" type="text" class="form-control input-lg" aria-describedby="basic-addon1"
                       value="{{$post->slug}}">
                <br>
                <label class="btn btn-primary btn-file">
                    <span class="glyphicon glyphicon-save"></span>
                    Neues Video hochladen <input type="file" name="file_0"
                                                 accept=".mp4"
                                                 style="display: none;">
                </label>
                <h4><span class="label label-default download-pic col-md-pull-1"></span></h4>
                <br>
                <div class="form-group">
                    <label for="body">Inhalt:</label>
                    <textarea class="form-control" rows="28" name="body" style="resize: none">{{$post->body}}</textarea>
                </div>


            </div>


            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Erstellt am:</dt>
                        <dd>{{$post->created_at->formatLocalized('%d.%m.%Y')}}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Bearbeitet am:</dt>
                        <dd>{{$post->updated_at->formatLocalized('%d.%m.%Y')}}</dd>
                    </dl>
                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">Speichern</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/posts/{{$post->id}}" class="btn btn-danger btn-block">Abbrechen</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection