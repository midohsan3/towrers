<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProject extends Notification
{
    use Queueable;
    private $project_id;
    private $name_en;
    private $name_ar;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project_id,$name_en,$name_ar)
    {
        $this->project_id = $project_id;
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
    public function toDatabase($notifiable)
    {
        return [
            'project_id' =>$this->project_id,
            'name_en'    =>'New Project Added '.$this->name_en,
            'name_ar'    =>'تم إضافة مشروع جديد '.$this->name_ar,
        ];
    }
}