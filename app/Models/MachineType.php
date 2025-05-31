<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{

    protected $table = 'machine_types';

    protected $fillable = ['name'];

    public function machines(){
        return $this->hasMany(Machine::class, 'type');
    }
}
