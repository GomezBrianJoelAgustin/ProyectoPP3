<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Work;

class Province extends Model
{

    protected $fillable = ['name'];

    public function works(){
        return $this->hasMany(Work::class, 'province');
    }
}
