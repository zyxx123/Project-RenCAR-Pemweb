<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class BookingCreatedNotification extends Notification
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
                    ->subject('Booking Confirmation: ' . $this->booking->booking_code)
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Your booking for ' . $this->booking->vehicle->brand . ' ' . $this->booking->vehicle->model . ' has been created successfully.')
                    ->line('Booking Code: ' . $this->booking->booking_code)
                    ->line('Start Date: ' . $this->booking->start_date)
                    ->line('End Date: ' . $this->booking->end_date)
                    ->line('Total Price: Rp ' . number_format($this->booking->total_price, 0, ',', '.'))
                    ->line('Please upload your payment proof within 24 hours to secure your booking.')
                    ->action('Upload Payment', route('booking.payment', $this->booking->id))
                    ->line('Thank you for choosing our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}
