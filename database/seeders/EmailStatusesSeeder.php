<?php

namespace Database\Seeders;

use App\Models\EmailStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Pending'],
            ['name' => 'Sent'],
            ['name' => 'Failed'],
            ['name' => 'Delivered'],
            ['name' => 'Bounced'],
            ['name' => 'Opened'],
        ];

        foreach ($statuses as $status) {
            EmailStatus::firstOrCreate($status);
        }
    }
}
