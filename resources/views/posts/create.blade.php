@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Posts</h1>
            <hr>
            <br>
            <form method="POST" action="/posts">
                {{ csrf_field() }}
                <div class="input-group col-md-4 {{--col-md-offset-5--}}">
                    <span class="input-group-addon">Title</span>
                    <input type="text" class="form-control" placeholder="Title" name="title" required>
                </div>

                <br>
                <div class="input-group col-md-4 {{--col-md-offset-5--}}">
                    <span class="input-group-addon">Slug</span>
                    <input type="text" class="form-control" placeholder="Slug" name="slug" required>
                </div>
        <br>

        <br>
        <div class="form-group">
            <label for="body">Post:</label>
            <textarea class="form-control" rows="7" id="body" name="body" required style="resize: none"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send Post</button>
        </form>
    </div>
    </div>


@endsection