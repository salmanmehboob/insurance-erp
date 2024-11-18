<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaritalStatus;

class MaritalStatusesSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name' => 'Single'],
            ['name' => 'Married'],
            ['name' => 'Divorced'],
            ['name' => 'Widowed'],
        ];

        foreach ($statuses as $status) {
            MaritalStatus::firstOrCreate($status);
        }
    }
}
