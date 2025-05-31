<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\MachineType;
use App\Models\Maintenance;


class Machine extends Model
{
    use hasFactory;

    protected $fillable = ['serial_number', 'type', 'model'];

        public function works()
    {
        return $this->hasOne(MachineWork::class, 'id_machines');

    }

    public function typeRelation(){
        return $this->belongsTo(MachineType::class, 'type');
    }

    public function maintenance(){
        return $this->hasMany(Maintenance::class, 'id_machine');
    }

    public function latestMachineWork()
    {
        return $this->hasOne(MachineWork::class, 'id_machines')->latestOfMany();
    }
}
