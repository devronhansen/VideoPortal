<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function show(User $user)
    {
       /* $comments = $user->comments();*/
        return view('profile.show', [
            'user' => $user,
            /*'comments' => $comments*/
        ]);
    }

    public function newName(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:50',
        ));

        Auth::user()->name = $request->input('name');
        Auth::user()->save();
        Session::Flash('success', 'Der Anzeigename wurde erfolgreich geändert');
        return back();
    }

    public function newPassword(Request $request)
    {
        $this->validate($request, array(
            'password' => 'required|max:50',
        ));

        Auth::user()->password = bcrypt($request->input('password'));
        Auth::user()->save();
        Session::Flash('success', 'Das Passwort wurde erfolgreich geändert');
        return back();
    }

}
u