<?php

namespace App\Notifications\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\NewUser as NewUserEmail;

class NewUser extends Notification
{
    use Queueable;

    private $user_id;
    private $password;

    public function __construct($user_id, $password)
    {
        $this->user_id = $user_id;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = \App\Models\User::findOrFail($this->user_id);
        return (new NewUserEmail)
                    ->with([
                        'user' => $user,
                        'password' => $this->password,
                    ]);
                    /*
                    ->attach(public_path('uploads/profiles/').$user->image, [
                        'as' => 'Ticket.pdf',
                        'mime' => 'application/pdf',
                    ]);
                    */
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $user = \App\Models\User::findOrFail($this->user_id);
        return [
            'user_id' => $user->id,
            'name' => $user->name,
        ];
    }
}
