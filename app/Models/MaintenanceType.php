<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance;

class MaintenanceType extends Model 
{

    protected $fillable = ['name'];

    public function maintenances(){
        return $this->hasMany(Maintenance::class, 'type');
    }
}
