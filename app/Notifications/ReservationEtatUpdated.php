<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationEtatUpdated extends Notification
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    public function toMail($notifiable)
    {
        $dateLocation = Carbon::createFromFormat('Y-m-d', $this->reservation->date_location)->format('d/m/Y');
        $dateRetour = Carbon::createFromFormat('Y-m-d', $this->reservation->date_retour)->format('d/m/Y');
        return (new MailMessage)
            ->subject('État de Votre Réservation Modifié')
            ->line('L\'état de votre réservation a été modifié.')

            ->line('Client : ' . $this->reservation->user->first_name . $this->reservation->user->name)
            ->line('Id reservation : ' . $this->reservation->id)
            ->line('etat : ' . $this->reservation->etat)
            ->line('Voiture : ' . $this->reservation->voiture->marque_modele)
            ->line('Lieu de prise : ' . $this->reservation->lieu_prise)
            ->line('Date de réservation : ' . $dateLocation)
            ->line('Lieu de retour : ' . $this->reservation->lieu_retour)
            ->line('Date de retour : ' . $dateRetour)
            ->line('Merci de votre attention.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        $dateLocation = Carbon::createFromFormat('Y-m-d', $this->reservation->date_location)->format('d/m/Y');
        $dateRetour = Carbon::createFromFormat('Y-m-d', $this->reservation->date_retour)->format('d/m/Y');
        return [
            'client_name' => $this->reservation->user->name,
            'reservation_id' => $this->reservation->id,
            'etat' => $this->reservation->etat,
            'car_model' => $this->reservation->voiture->marque_modele,
            'lieu_prise' => $this->reservation->lieu_prise,
            'date_location' => $dateLocation,
            'lieu_retour' => $this->reservation->lieu_retour,
            'date_retour' => $dateRetour,
        ];
    }
}
