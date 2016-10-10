<?php

namespace App\Listeners;

use App\Events\UserWasBanned;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class EmailBanNotification
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        $data = array(
            'email' => $event->user->email,
            'name' => $event->user->name,
        );
        Mail::send('emails.userwasbanned', $data, function ($message) use ($event){
            $message->from('tsbw.kickstart@gmail.com');
            $message->to($event->user->email);
            $message->subject('Ihr Account wurde gesperrt');
        });
    }
}
