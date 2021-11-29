<?php

namespace App\Listeners;
use App\Events\NewUserEvent;
use App\Models\User;
use App\Notifications\Users\NewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NewUser as NewUserEmail;
use Illuminate\Support\Facades\Mail;

class NewUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NewUserEvent $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        $user = $event->user;
        $request = $event->request;
        Mail::to($user->email)->send(new NewUserEmail($user, $request));

    }
    
}
