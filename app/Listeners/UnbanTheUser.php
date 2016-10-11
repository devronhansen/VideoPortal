<?php

namespace App\Listeners;

use App\Events\UserWasUnbanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnbanTheUser
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
        if(!$event->user->isAdmin)
            $event->user->isBanned = '0';
    }
}
