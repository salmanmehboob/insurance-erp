<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Console\Command;
use Spatie\Permission\PermissionRegistrar;

class UpdatePermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Permission When New Module Added';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $modules = Module::all();

        $permissions = array(
            'View',
            'Create',
            'Edit',
            'Delete',
        );

        $agentPermissions = array(
            'Access Business Report',
            'Access Daily Transaction Report',
            'Access Account Reconcile',
            'Allow Edit/Delete/Void Payments & Deleting Clients',
            'Allow Agency Setup',
            'Allow Check Writing and Printing',
            'Allow Company & User Screen Access',
            'Allow Postmarking & Mail Logs Edit',
            'Pre-fill Amount When Taking Payments',
            'Allow Add/Edit Access for Agency Fees'
        );

        foreach ($modules as $module) {
            if($module->name == 'Agent'){
                foreach ($agentPermissions as $agp) {
                    $agentPermissionName = $agp . ' ' . $module->name;
                    $agentPermissionExist = Permission::where('short_name', $agentPermissionName)->exists();
                    if ($agentPermissionExist == false) {
                        Permission::create(['short_name' => $agentPermissionName, 'name' => str_replace(' ', '-', strtolower($agentPermissionName)) , 'module' => $module->id]);
                    }
                }
            }else{
                foreach ($permissions as $permission) {
                    $permissionName = $permission . ' ' . $module->name;
                    $permissionExist = Permission::where('short_name', $permissionName)->exists();
                    if ($permissionExist == false) {
                        Permission::create(['short_name' => $permissionName, 'name' => str_replace(' ', '-', strtolower($permissionName)) , 'module' => $module->id]);
                    }
                }
            }

        }

    }
}
