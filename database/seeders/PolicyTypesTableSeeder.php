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
            ['name' => 'Auto', 'group' => 'General'],
            ['name' => 'Bond', 'group' => 'Commercial'],
            ['name' => 'Commercial', 'group' => 'Commercial'],
            ['name' => 'Commercial Auto', 'group' => 'Commercial'],
            ['name' => 'General Liability', 'group' => 'Commercial'],
            ['name' => 'Health', 'group' => 'General'],
            ['name' => 'Home Owner', 'group' => 'Home'],
            ['name' => 'Life', 'group' => 'General'],
            ['name' => 'Mobile Home', 'group' => 'Home'],
            ['name' => 'Pollution', 'group' => 'Commercial'],
            ['name' => 'Umbrella', 'group' => 'Commercial'],
            ['name' => 'Work Comp', 'group' => 'Commercial'],
            ['name' => 'Package', 'group' => 'Commercial'],
            ['name' => 'EPLI', 'group' => 'Commercial'],
            ['name' => 'Inland Marin', 'group' => 'Commercial'],
            ['name' => 'Crime', 'group' => 'Commercial'],
        ];

        foreach ($policyTypes as $type) {
            PolicyType::updateOrCreate(
                ['name' => $type['name']],
                ['group' => $type['group']]
            );
        }

    }
}
