<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationLevel;

class EducationLevelsSeeder extends Seeder
{
    public function run()
    {
        $educationLevels = [
            ['name' => 'High School'],
            ['name' => 'Diploma'],
            ['name' => 'Bachelor\'s Degree'],
            ['name' => 'Master\'s Degree'],
            ['name' => 'Doctorate'],
        ];

        foreach ($educationLevels as $level) {
            EducationLevel::firstOrCreate($level);
        }
    }
}
