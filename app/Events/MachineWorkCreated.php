<?php

namespace App\Events;

use App\Models\MachineWork;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;


class MachineWorkCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $machineWorks;
    /**
     * Create a new event instance.
     */
    public function __construct(MachineWork $machineWorks)
    {
        $this->machineWorks = $machineWorks;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
