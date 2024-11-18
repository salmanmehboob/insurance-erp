<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleModel;
use App\Models\VehicleMake;

class VehicleModelsSeeder extends Seeder
{
    public function run()
    {
        $models = [
            ['make' => 'Toyota', 'models' => ['Corolla', 'Camry', 'RAV4']],
            ['make' => 'Ford', 'models' => ['Mustang', 'Focus', 'Explorer']],
            ['make' => 'Honda', 'models' => ['Civic', 'Accord', 'CR-V']],
            ['make' => 'Chevrolet', 'models' => ['Malibu', 'Equinox', 'Tahoe']],
            ['make' => 'BMW', 'models' => ['X5', '3 Series', '5 Series']],
        ];

        foreach ($models as $makeWithModels) {
            $make = VehicleMake::firstOrCreate(['name' => $makeWithModels['make']]);

            foreach ($makeWithModels['models'] as $modelName) {
                VehicleModel::firstOrCreate([
                    'make_id' => $make->id,
                    'name' => $modelName,
                ]);
            }
        }
    }
}
