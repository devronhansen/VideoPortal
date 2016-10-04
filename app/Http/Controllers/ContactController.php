<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:150',
            'email' => 'required|email',
            'subject' => 'required|max:500',
            'comment' => 'required|max:2000'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'comment' => $request->comment,
            'name' => $request->name,
        );

        Mail::send('emails.contact', $data, function ($message) use ($data){
                $message->from($data['email']);
                $message->to('tsbw.kickstart@gmail.com');
                $message->subject($data['subject']);
        });

        Session::flash('success', 'Die Email wurde erfolgreich gesendet');

        return redirect('/');
    }
}