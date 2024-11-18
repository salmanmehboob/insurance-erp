<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Year;

class YearsSeeder extends Seeder
{
    public function run()
    {
        $currentYear = now()->year;

        for ($year = 2010; $year <= $currentYear; $year++) {
            Year::firstOrCreate(['year' => $year]);
        }
    }
}
