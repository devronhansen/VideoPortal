@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Alle Benutzer</h3>
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Erstellt am</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <td>{{(strlen($user->name)>=25) ? substr($user->name, 0, 25)."..." : $user->name}}</td>
                        <td>{{(strlen($user->email)>=25) ? substr($user->email, 0, 25)."..." : $user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        @if(!$user->isBanned)
                            <td><a href="/user/ban/{{$user->id}}" class="btn btn-danger btn-block" @if($user->isAdmin) disabled @endif>Bannen</a></td>
                        @else
                            <td><a href="/user/unban/{{$user->id}}" class="btn btn-success btn-block">Entbannen</a></td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection