<?php

namespace App\Notifications;

use App\PersonnelInformation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PersonnelReviewed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private PersonnelInformation $personnel;
    private string $reviewedByName;
    private string $status;
    public function __construct(PersonnelInformation $personnel, string $reviewedByName, string $status)
    {
        $this->personnel = $personnel;
        $this->reviewedByName = $reviewedByName;
        $this->status = $status;
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
            'personnel_reviewed_by' => $this->reviewedByName,
            'status' => $this->status,
        ];
    }
}
