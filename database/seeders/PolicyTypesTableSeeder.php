<?php

namespace Database\Seeders;

use App\Models\PolicyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policyTypes = [
            'Auto', 'Bond', 'Commercial', 'Commercial Auto',
            'Gen Liab', 'Health', 'Home Owner', 'Life',
            'Mobile Home', 'Pollution', 'Umbrella', 'Work Comp'
        ];

        foreach ($policyTypes as $type) {
            PolicyType::updateOrCreate(['name' => $type]);
        }
    }
}
