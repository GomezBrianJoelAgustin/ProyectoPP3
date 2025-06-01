<?php

namespace App\Events;

use App\Models\Machine;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MaintenanceAlert
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $machine; 
    public $kmSinceLastMaintenance;
    public $maintenanceThreshold;
    public $maintenanceTypeName;

    public function __construct(Machine $machine, float $kmSinceLastMaintenance, int $maintenanceThreshold, string $maintenanceTypeName)
    {
        $this->machine = $machine;
        $this->kmSinceLastMaintenance = $kmSinceLastMaintenance;
        $this->maintenanceThreshold = $maintenanceThreshold;
        $this->maintenanceTypeName = $maintenanceTypeName;
    }

    public function broadcastOn(): array
    {
        return [];
    }
}