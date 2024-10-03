<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJob extends Notification
{
    use Queueable;
    private $job_id;
    private $name_en;
    private $name_ar;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job_id,$name_en,$name_ar)
    {
        $this->job_id = $job_id;
        $this->name_en = $name_en;
        $this->name_ar = $name_ar;
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
            'job_id'  => $this->job_id,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
        ];
    }
}