<?php

namespace Database\Seeders;

use App\Models\PolicyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'New Business'],
            ['name' => 'Renewal'],
            ['name' => 'Reinitiate'],
            ['name' => 'Rewrite'],
            ['name' => 'Cancelled'],
            ['name' => 'Expired'],
            ['name' => 'Prospect'],
            ['name' => 'Quote'],
            ['name' => 'Decline'],
            ['name' => 'In Progress'],
            ['name' => 'Pending Payment'],
            ['name' => 'Approved'],
            ['name' => 'Rejected'],
            ['name' => 'Terminated'],
            ['name' => 'Suspended'],
        ];

        foreach ($statuses as $status) {
            PolicyStatus::firstOrCreate($status);
        }
    }
}
