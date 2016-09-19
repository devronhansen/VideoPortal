@extends('layouts.app')

@section('content')
        <div class="container">
        <h2>Kontaktier uns<small><br>Hast du Fragen oder Anmerkungen? Schreibe uns eine Email</small></h2>
            <hr>
            <br>
            <div class="input-group col-sm-6 col-md-4">
                <span class="input-group-addon" id="basic-addon1">Dein Name</span>
                <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
            </div>
            <br>
            <div class="input-group col-sm-6 col-md-4">
                <span class="input-group-addon" id="basic-addon1">Deine Email</span>
                <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
            </div>
            <br>
            <br>
            <div class="form-group">
                <label for="comment">Dein Email Text:</label>
                <textarea class="form-control" rows="10" id="comment" style="resize: none"></textarea>
            </div>
            </form>
            <button type="button" class="btn btn-primary">Senden</button>
        </div>

@endsection