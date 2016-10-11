@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Alle Benutzer</h1>
            <hr>
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
                            <form action="/user/ban/{{$user->id}}">
                                <td>
                                    <button class="btn btn-danger btn-block" @if($user->isAdmin) disabled @endif>
                                        Bannen
                                    </button>
                                </td>
                            </form>
                        @else
                            <form action="/user/unban/{{$user->id}}">
                                <td>
                                    <button class="btn btn-success btn-block">Entbannen</button>
                                </td>
                            </form>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection