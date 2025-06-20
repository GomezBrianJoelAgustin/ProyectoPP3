<?php

namespace App\Listeners;

use App\Events\MachineWorkCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail; 
use App\Mail\MachineWorkNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMachineWorkNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MachineWorkCreated $event): void
    {
        \Log::info('LISTENER: Received MachineWorkCreated event. Processing notification.');

        $machineWork = $event->machineWorks;
        $recipientEmail = "juegosagustingomez@gmail.com" ; 

        Mail::to($recipientEmail)->send(new MachineWorkNotification($machineWork));
        Log::info('New Machine Work created: Notification email sent.', [
            'id' => $machineWork->id,
            'fecha' => $machineWork->date_start,
            'destinatario' => $recipientEmail,
        ]);
    }
}
