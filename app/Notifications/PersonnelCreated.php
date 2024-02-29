<?php

namespace App\Notifications;

use App\Personnel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PersonnelCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private Personnel $personnel;
    private string $createdByName;
    public function __construct(Personnel $personnel, string $createdByName)
    {
        $this->personnel = $personnel;
        $this->createdByName = $createdByName;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'personnel_id' => $this->personnel->id,
            'personnel_firstname' => $this->personnel->firstname,
            'personnel_lastname' => $this->personnel->lastname,
            'personnel_created_by' => $this->createdByName,
        ];
    }
}
