<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MachineWork;

class ReasonEnd extends Model
{
    protected $fillable = ['type'];
    
    public function machineWork(){
        return $this->hasMany(MachineWork::class, 'reason_end');
    }
}
