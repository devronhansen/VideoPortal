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
            <div class="panel-body profile-settings" data-toggle="modal" data-target="#myModal">Anzeigenamen ändern
            </div>
            <form action="/profile/newname" method="POST">
                {{csrf_field()}}
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Anzeigenamen ändern</h4>
                            </div>
                            <div class="modal-body">
                                <input name="name" type="text" class="form-control input-lg"
                                       aria-describedby="basic-addon1"
                                       value="{{$user->name}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Speichern</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="panel-body profile-settings" data-toggle="modal" data-target="#changepic">Profilbild ändern
            </div>
            <div id="changepic" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Profilbild ändern</h4>
                        </div>
                        <div class="modal-body">
                            <p>bla bla <a href="https://de.gravatar.com/">Klicke hier</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel-body profile-settings" data-toggle="modal" data-target="#changepw">Kennwort ändern</div>
            <form action="/profile/newpassword" method="POST">
                {{csrf_field()}}
                <div id="changepw" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Passwort ändern</h4>
                            </div>
                            <div class="modal-body">
                                <input name="password" type="text" class="form-control input-lg"
                                       aria-describedby="basic-addon1">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Speichern</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-9 pull-left">
        <div class="panel panel-primary">
            <div class="panel-heading">Ihre letzten
                Kommentare
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Artikel</th>
                    <th>Kommentar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->comments as $comment)
                    <tr>
                        <td class="no-wrap"><a href="/video/{{$comment->post->slug}}">{{ $comment->post->title}}</a>
                        </td>
                        <td>{{strip_tags($comment->comment)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{--  alle kommentare--}}
@endsection