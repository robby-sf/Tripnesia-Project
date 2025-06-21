<?php

namespace App\Listeners;

use App\Events\TicketConfirmed;
use App\Mail\TicketIssuedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendTicketNotification implements ShouldQueue
{
    public function handle(TicketConfirmed $event): void
    {
        try {
            $user = $event->transaction->user;

            Mail::to($user->email)->send(new TicketIssuedMail($event->transaction));

            Log::info("Ticket email successfully sent to {$user->email} for order {$event->transaction->order_id}.");
        } catch (\Exception $e) {
            Log::error("Failed to send ticket email for order {$event->transaction->order_id}: " . $e->getMessage());
        }
    }
}
