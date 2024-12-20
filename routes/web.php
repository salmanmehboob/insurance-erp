<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\Dashboard\SuperAdminDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralAgentController;
use App\Http\Controllers\Admin\InsuranceCompanyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('our-dashboard', [SuperAdminDashboardController::class, 'index'])->name('our-dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('update-password', [AdminController::class, 'updatePassword'])->name('update-password');
    Route::put('change-password{id}', [AdminController::class, 'ChangePassword'])->name('change-password');

    //User Controllers
    Route::get('show-user', [UserController::class, 'show'])->name('show-user');
    Route::get('add-user', [UserController::class, 'index'])->name('add-user');
    Route::post('store-user', [UserController::class, 'store'])->name('store-user');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('edit-user');
    Route::put('update-user{id}', [UserController::class, 'update'])->name('update-user');
    Route::post('changeStatus-user', [UserController::class, 'destroy'])->name('changeStatus-user');
     Route::post('changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/user/restore', [UserController::class, 'restore'])->name('restore-user');


    Route::get('show-role', [RoleController::class, 'show'])->name('show-role');
    Route::get('add-role', [RoleController::class, 'index'])->name('add-role');
    Route::post('store-role', [RoleController::class, 'store'])->name('store-role');
    Route::get('role/{id}/edit', [RoleController::class, 'edit'])->name('edit-role');
    Route::put('update-role{id}', [RoleController::class, 'update'])->name('update-role');
    Route::post('destroy-role', [RoleController::class, 'destroy'])->name('destroy-role');

    Route::get('show-agency', [AgencyController::class, 'index'])->name('show-agency');
    Route::get('add-agency', [AgencyController::class, 'create'])->name('add-agency');
    Route::post('store-agency', [AgencyController::class, 'store'])->name('store-agency');
    Route::get('agency/{id}/edit', [AgencyController::class, 'edit'])->name('edit-agency');
    Route::put('update-agency{id}', [AgencyController::class, 'update'])->name('update-agency');
    Route::post('destroy-agency', [AgencyController::class, 'destroy'])->name('destroy-agency');
    Route::get('/trashed-agencies', [AgencyController::class, 'trashedIndex'])->name('trashed-agencies');
    Route::post('/restore-agency/{id}', [AgencyController::class, 'restoreAgency'])->name('restore-agency');
    Route::delete('/force-delete-agency/{id}', [AgencyController::class, 'forceDeleteAgency'])->name('force-delete-agency');


    Route::get('show-agent', [AgentController::class, 'index'])->name('show-agent');
    Route::get('add-agent', [AgentController::class, 'create'])->name('add-agent');
    Route::post('store-agent', [AgentController::class, 'store'])->name('store-agent');
    Route::get('agent/{id}/edit', [AgentController::class, 'edit'])->name('edit-agent');
    Route::put('update-agent{id}', [AgentController::class, 'update'])->name('update-agent');
    Route::post('destroy-agent', [AgentController::class, 'destroy'])->name('destroy-agent');
    Route::get('agents/trashed', [AgentController::class, 'trashed'])->name('trashed-agents');
    Route::post('agents/restore/{id}', [AgentController::class, 'restore'])->name('restore-agent');
    Route::delete('agents/force-delete/{id}', [AgentController::class, 'forceDelete'])->name('force-delete-agent');

    Route::get('show-company', [InsuranceCompanyController::class, 'index'])->name('show-company');
    Route::get('add-company', [InsuranceCompanyController::class, 'create'])->name('add-company');
    Route::post('store-company', [InsuranceCompanyController::class, 'store'])->name('store-company');
    Route::get('company/{id}/edit', [InsuranceCompanyController::class, 'edit'])->name('edit-company');
    Route::put('update-company{id}', [InsuranceCompanyController::class, 'update'])->name('update-company');
    Route::post('destroy-company', [InsuranceCompanyController::class, 'destroy'])->name('destroy-company');
    Route::get('company/trashed', [InsuranceCompanyController::class, 'trashed'])->name('company.trashed');
    Route::get('company/restore/{id}', [InsuranceCompanyController::class, 'restore'])->name('company.restore');
    Route::delete('company/delete-permanent/{id}', [InsuranceCompanyController::class, 'forceDelete'])->name('company.forceDelete');

    Route::get('show-general-agent', [GeneralAgentController::class, 'index'])->name('show-general-agent');
    Route::get('add-general-agent', [GeneralAgentController::class, 'create'])->name('add-general-agent');
    Route::post('store-general-agent', [GeneralAgentController::class, 'store'])->name('store-general-agent');
    Route::get('general-agent/{id}/edit', [GeneralAgentController::class, 'edit'])->name('edit-general-agent');
    Route::put('update-general-agent{id}', [GeneralAgentController::class, 'update'])->name('update-general-agent');
    Route::post('destroy-general-agent', [GeneralAgentController::class, 'destroy'])->name('destroy-general-agent');
    Route::get('general-agent/trashed', [GeneralAgentController::class, 'trashed'])->name('general-agent.trashed');
    Route::get('general-agent/restore/{id}', [GeneralAgentController::class, 'restore'])->name('general-agent.restore');
    Route::delete('general-agent/delete-permanent/{id}', [GeneralAgentController::class, 'forceDelete'])->name('general-agent.forceDelete');

    Route::get('show-client', [ClientController::class, 'index'])->name('show-client');
    Route::get('policy-type-client', [ClientController::class, 'showPolicyType'])->name('policy-type-client');
    Route::get('add-client', [ClientController::class, 'create'])->name('add-client');
    Route::post('store-client', [ClientController::class, 'store'])->name('store-client');
    Route::get('client/{id}/edit', [ClientController::class, 'edit'])->name('edit-client');
    Route::put('update-client{id}', [ClientController::class, 'update'])->name('update-client');
    Route::post('destroy-client', [ClientController::class, 'destroy'])->name('destroy-client');
    Route::get('clients/trashed', [ClientController::class, 'trashed'])->name('trashed-clients');
    Route::post('clients/restore/{id}', [ClientController::class, 'restore'])->name('restore-client');
    Route::delete('clients/force-delete/{id}', [ClientController::class, 'forceDelete'])->name('force-delete-client');




});
