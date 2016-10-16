@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3 pull-right btn-h1-spacing">
            <div class="well">
                <form method="POST" action="/categories">
                    {{ csrf_field() }}
                    <h2>Neue Kategorie</h2>
                    {{--      <span class="input-group-addon">Name:</span>--}}
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Speichern</button>
                </form>
            </div>
        </div>
    </div>
@endsection