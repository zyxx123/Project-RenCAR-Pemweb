<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class PaymentVerifiedNotification extends Notification
{
    use Queueable;

    protected $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Payment Verified: ' . $this->booking->booking_code)
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Great news! Your payment for booking ' . $this->booking->booking_code . ' has been verified.')
                    ->line('Vehicle: ' . $this->booking->vehicle->brand . ' ' . $this->booking->vehicle->model)
                    ->line('Your booking is now fully confirmed. You can pick up the vehicle on ' . $this->booking->start_date . '.')
                    ->action('View Booking', route('dashboard'))
                    ->line('Have a safe trip!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
