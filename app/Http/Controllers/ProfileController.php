<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;

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
}
