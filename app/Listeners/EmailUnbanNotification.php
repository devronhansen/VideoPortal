<?php

namespace App\Listeners;

use App\Events\UserWasUnbanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailUnbanNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasUnbanned  $event
     * @return void
     */
    public function handle(UserWasUnbanned $event)
    {
        $data = array(
            'email' => $event->user->email,
            'name' => $event->user->name,
        );
        Mail::send('emails.userwasunbanned', $data, function ($message) use ($event){
            $message->from('tsbw.kickstart@gmail.com');
            $message->to($event->user->email);
            $message->subject('Ihr Account wurde entsperrt');
        });
    }
}
