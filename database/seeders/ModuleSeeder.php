<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = array (
            'Users',
            'Roles',
            'Agencies',
            'Agent',
            'Company',
            'General Agent',
            'Client',
            'Payment',
            'Payment Check',
            'Bank',
            'Commission',
            'Reminder',

        );

        foreach ($modules as $row) {
            Module::firstOrCreate([
                'name' => $row,
            ]);
        }
    }
}
