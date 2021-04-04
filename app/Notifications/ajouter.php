<?php

namespace App\Notifications;

use App\Models\RH;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ajouter extends Notification
{
    use Queueable;
        public $rh;
        public $users ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RH $rh)
    {
        $this->rh =$rh ;
        $this->users = User::all();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'rhId' => $this->rh->getFirstMedia()['id'],
            'rhName' => $this->rh->getFirstMedia()['name'],
        ];
    }
}
