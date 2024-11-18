<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleMake;

class VehicleMakesSeeder extends Seeder
{
    public function run()
    {
        $makes = [
            ['name' => 'Toyota'],
            ['name' => 'Ford'],
            ['name' => 'Honda'],
            ['name' => 'Chevrolet'],
            ['name' => 'BMW'],
        ];

        foreach ($makes as $make) {
            VehicleMake::firstOrCreate($make);
        }
    }
}
