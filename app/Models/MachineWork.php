<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\hasFactory;
use App\Models\Machine;
use App\Models\Work;
use App\Models\ReasonEnd;

class MachineWork extends Model
{
    use hasFactory;

    protected $fillable = ['date_start', 'date_end', 'reason_end', 'km_travel', 'id_machines', 'id_works'];

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'id_machines');
    }

    public function work()
    {
        return $this->belongsTo(Work::class, 'id_works');
    }

    public function reasonEnd(){
        return $this->belongsTo(ReasonEnd::class, 'reason_end');
    }
}
    