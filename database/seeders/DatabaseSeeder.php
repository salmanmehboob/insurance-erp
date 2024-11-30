<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ModuleSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
             PermissionsSeeder::class,

             UsStatesSeeder::class,
            EmailStatusesSeeder::class,
            PrimaryLanguagesSeeder::class,
            BankAccountSeeder::class,
        ]);
    }
}
