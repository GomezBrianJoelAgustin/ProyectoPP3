<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Province;

class Work extends Model
{

    use hasFactory;

    protected $fillable = ['name', 'province', 'date_start', 'date_end'];

    public function machines()
    {
        return $this->hasMany(MachineWork::class, 'id_works');
    }

    public function provinces(){
        return $this->belongsTo(Province::class, 'province');
    }

}
