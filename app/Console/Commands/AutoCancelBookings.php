<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class AutoCancelBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:auto-cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically cancel pending bookings older than 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bookings = Booking::where('status', 'pending')
            ->where('created_at', '<', Carbon::now()->subHours(24))
            ->get();

        $count = 0;
        foreach ($bookings as $booking) {
            $booking->update(['status' => 'cancelled']);
            if ($booking->vehicle) {
                $booking->vehicle->update(['status' => 'available']);
            }
            
            // Send Notification
            if ($booking->user) {
                $booking->user->notify(new \App\Notifications\BookingCancelledNotification($booking));
            }
            
            $count++;
        }

        $this->info("Successfully cancelled {$count} pending bookings.");
    }
}
