<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\MaintenanceType;

class Maintenance extends Model
{
    use hasFactory;

    protected $fillable = [
        'id_machine',
        'maintenance_date_start',
        'maintenance_date_end',
        'type',
    ];

     protected $dates = [
        'maintenance_date_start',
        'maintenance_date_end',
    ];

    public function machines(){
        return $this->belongsTo(Machine::class, 'id_machine');
    }

    public function maintenanceTypes(){
        return $this->belongsTo(MaintenanceType::class, 'type');
    }
}
