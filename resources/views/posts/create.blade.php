@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Posts</h1>
            <hr>
            <br>
            <form method="POST" action="/posts" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group col-md-4 {{--col-md-offset-5--}}">
                    <span class="input-group-addon">Titel</span>
                    <input type="text" class="form-control" placeholder="Title" name="title" required>
                </div>

                <br>
                <div class="input-group col-md-4 {{--col-md-offset-5--}}">
                    <span class="input-group-addon">Slug</span>
                    <input type="text" class="form-control" placeholder="Slug" name="slug" required>
                </div>
                <br>
                <br><label class="btn btn-primary btn-file col-md-4 col-md-offset-1">
                    <span class="glyphicon glyphicon-save"></span>
                    Neues Video hochladen <input type="file" name="file_0"
                                                 accept=".mp4"
                                                 style="display: none;">
                </label>

                <label class="btn btn-primary btn-file col-md-4 col-md-offset-1">
                    <span class="glyphicon glyphicon-save"></span>
                    Neues Bild hochladen <input type="file" name="file_image"
                                                accept=".bmp, .gif, .jpeg, .jpg, .png"
                                                style="display: none;">
                </label>
                <h4><span class="label label-default download-video col-md-offset-1 col-md-4"
                          style="display: block"></span></h4>
                <h4><span class="label label-default download-pic col-md-offset-1 col-md-4"
                          style="display: block"></span></h4>

                <br>

                <div class="form-group col-md-12" style="margin-top: 25px">
                    <label for="body">Post:</label>
                    <textarea class="form-control" rows="7" id="body" name="body" required
                              style="resize: none"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sende Post</button>
            </form>
        </div>
    </div>


@endsection