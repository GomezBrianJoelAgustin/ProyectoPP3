<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\MachineWorkCreated::class => [
            \App\Listeners\SendMachineWorkNotification::class,
        ],
        \App\Events\MaintenanceAlert::class => [ 
        \App\Listeners\SendMaintenanceAlert::class,
    ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
