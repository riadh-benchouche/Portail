<?php

namespace App\Notifications;

use App\Models\TeAstuce;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Annonce;

class TeAAjouter extends Notification
{
    use Queueable;
    public $TeA;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(TeAstuce $TeA)
    {
        $this->TeA =$TeA;
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


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

            'TeAId' => $this->TeA->id,
            'TeAName' => $this->TeA->title,
        ];
    }
}
