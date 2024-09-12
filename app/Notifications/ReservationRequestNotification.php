<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationRequestNotification extends Notification
{
    use Queueable;
    private $reservation;
    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database', 'mail']; // Utiliser la base de données et le mail
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle Demande de Réservation')
            ->line('Une nouvelle demande de réservation a été envoyée.')
            ->action('Voir la réservation', url('/reservations/' . $this->reservation->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Une nouvelle demande de réservation a été envoyée.',
            'reservation_id' => $this->reservation->id,
        ];
    }
}
