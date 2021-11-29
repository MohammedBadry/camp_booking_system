<?php

namespace App\Notifications\Orders;

use Illuminate\Bus\Queueable;
use App\Models\Order;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;

class SendAdminInvoice extends Notification
{
    use Queueable;

    /**
     * @var string|int
     */
    private $order_id;

    /**
     * Create a new notification instance.
     *
     * @param $order_id
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $order = Order::findOrFail($this->order_id);
        $url = url('/invoice/'.$this->order_id);

        return (new MailMessage)
            ->subject(trans('orders.invoice.singular'))
            ->line(trans('orders.invoice.line2'))
            ->action(trans('orders.invoice.view'), $url)
            ->line(trans('auth.emails.forget-password.footer'))
            ->salutation(trans('auth.emails.forget-password.salutation', [
                'app' => Config::get('app.name'),
            ]));
    }
}
