<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReasonEnd;

class ReasonEndSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $reasonsEnd = ['Finished its task', 'Mechanical failure', 'Reassignment'];

        foreach($reasonsEnd as $type){
            ReasonEnd::create(['type' => $type]);
        }

    }
}
