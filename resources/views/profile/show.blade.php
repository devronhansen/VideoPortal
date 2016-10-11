@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
    <div class="page-header">
        <h1><i class="fa fa-wrench" aria-hidden="true"></i>
            {{$user->name}}</h1>
    </div>
    <div class="col-md-3 pull-right">
        <div class="panel panel-info">
            <div class="panel-heading">{{--<panel class="glyphicon glyphicon-cog pull-right"></panel>--}}
                Einstellungen
            </div>
            <div class="panel-body profile-settings">Anzeigenamen ändern</div>
            <div class="panel-body profile-settings">Profilbild ändern</div>
            <div class="panel-body profile-settings">Kennwort ändern</div>
        </div>
    </div>

    <div class="col-md-9 pull-left">
        <div class="panel panel-primary">
            <div class="panel-heading">{{--<panel class="glyphicon glyphicon-cog pull-right"></panel>--}} Ihre letzten
                Kommentare
            </div>
           {{-- @foreach($comments as $comment)
                <div class="panel-body profile-comments">{{$comment}}</div>
            @endforeach--}}
        </div>
    </div>
    {{--  alle kommentare--}}
@endsection