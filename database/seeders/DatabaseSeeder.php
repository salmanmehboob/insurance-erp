<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

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
            BankAccountSeeder::class,
            EducationLevelsSeeder::class,
            EmailStatusesSeeder::class,
            GendersSeeder::class,
            MaritalStatusesSeeder::class,
            ModuleSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PermissionsSeeder::class,
            PolicyStatusesSeeder::class,
            PrimaryLanguagesSeeder::class,
            RelationshipsSeeder::class,
            TermsSeeder::class,
            UsStatesSeeder::class,
            VehicleMakesSeeder::class,
            VehicleModelsSeeder::class,
            YearsSeeder::class,
        ]);

        $this->runPermissionUpdateCommand();

    }

    private function runPermissionUpdateCommand()
    {
        Artisan::call('permission:update');
        $this->command->info('Permissions updated successfully.');
    }
}
