@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/contact" method="POST">
            {{csrf_field()}}
            <h2>Kontaktier uns
                <small><br>Hast du Fragen oder Anmerkungen? Schreibe uns eine Email</small>
            </h2>
            <hr>
            <br>
            <div class="input-group col-sm-6 col-md-4">
                <span class="input-group-addon" id="basic-addon1">Dein Name</span>
                <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1" name="name"
                       @if(Auth::check())
                       value="{{Auth::user()->name}}"
                        @endif
                >
            </div>
            <br>
            <div class="input-group col-sm-6 col-md-4">
                <span class="input-group-addon" id="basic-addon1">Deine Email</span>
                <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email"
                       @if(Auth::check())
                       value="{{Auth::user()->email}}"
                        @endif
                >
            </div>
            <br>
            <div class="input-group col-sm-6 col-md-4">
                <span class="input-group-addon" id="basic-addon1">Thema:</span>
                <input type="text" class="form-control" placeholder="Thema" aria-describedby="basic-addon1"
                       name="subject">
            </div>
            <br>
            <br>
            <div class="form-group">
                <label for="comment">Dein Email Text:</label>
                <textarea class="form-control" rows="10" id="comment" name="comment"
                          style="resize: none">{{old('comment')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Email senden</button>
        </form>
    </div>

@endsection