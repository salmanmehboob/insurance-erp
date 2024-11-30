<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\Dashboard\SuperAdminDashboardController;
use App\Http\Controllers\Admin\DashboardController;
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
    Route::post('changeStatus-user', [UserController::class, 'changeStatus'])->name('changeStatus-user');
    Route::post('delete-user', [UserController::class, 'delete'])->name('delete-user');
    Route::post('changePassword', [UserController::class, 'changePassword'])->name('changePassword');


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


    Route::get('show-agent', [AgentController::class, 'index'])->name('show-agent');
    Route::get('add-agent', [AgentController::class, 'create'])->name('add-agent');
    Route::post('store-agent', [AgentController::class, 'store'])->name('store-agent');
    Route::get('agent/{id}/edit', [AgentController::class, 'edit'])->name('edit-agent');
    Route::put('update-agent{id}', [AgentController::class, 'update'])->name('update-agent');
    Route::post('destroy-agent', [AgentController::class, 'destroy'])->name('destroy-agent');


});



