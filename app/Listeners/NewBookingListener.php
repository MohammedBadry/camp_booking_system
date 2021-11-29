<?php

namespace App\Listeners;
use App\Events\NewBookingEvent;
use App\Models\Booking;
use App\Notifications\Users\NewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NewBooking as NewBookingEmail;
use Illuminate\Support\Facades\Mail;

class NewBookingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NewBookingEvent $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewBookingEvent $event)
    {
        $booking = $event->booking;
        Mail::to($booking->email)->send(new NewBookingEmail ($booking));
    }
    
}
