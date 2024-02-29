<?php

namespace App\Notifications;

use App\Personnel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PersonnelUpdated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private Personnel $personnel;
    private string $updatedByName;
    public function __construct(Personnel $personnel, string $updatedByName)
    {
        $this->personnel = $personnel;
        $this->updatedByName = $updatedByName;
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
            'personnel_created_by' => $this->updatedByName,
        ];
    }
}
