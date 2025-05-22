<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\Dashboard\SuperAdminDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\Admin\GeneralAgentController;
use App\Http\Controllers\Admin\InsuranceCompanyController;
use App\Http\Controllers\Admin\PaymentCheckController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReminderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get-make-by-model', [AjaxController::class, 'getMakeByModel']);
Route::get('get-client-data', [AjaxController::class, 'getClientData']);

Route::middleware(['auth'])->group(function () {

    Route::get('our-dashboard', [SuperAdminDashboardController::class, 'index'])->name('our-dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('update-password', [AdminController::class, 'updatePassword'])->name('update-password');
    Route::put('change-password{id}', [AdminController::class, 'ChangePassword'])->name('change-password');
    Route::get('activity-logs', [AdminController::class, 'logActivityLists'])->name('activity-logs');

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


    Route::get('show-payment', [PaymentController::class, 'index'])->name('show-payment');
    Route::get('add-payment', [PaymentController::class, 'create'])->name('add-payment');
    Route::post('store-payment', [PaymentController::class, 'store'])->name('store-payment');
    Route::get('payment/{id}/view', [PaymentController::class, 'view'])->name('view-payment');
    Route::get('payment/{id}/edit', [PaymentController::class, 'edit'])->name('edit-payment');
    Route::put('update-payment{id}', [PaymentController::class, 'update'])->name('update-payment');
    Route::post('destroy-payment', [PaymentController::class, 'destroy'])->name('destroy-payment');
    Route::get('payments/trashed', [PaymentController::class, 'trashed'])->name('trashed-payments');
    Route::post('payments/restore/{id}', [PaymentController::class, 'restore'])->name('restore-payment');
    Route::delete('payments/force-delete/{id}', [PaymentController::class, 'forceDelete'])->name('force-delete-payment');

    Route::get('show-payment-check', [PaymentCheckController::class, 'index'])->name('show-payment-check');
    Route::get('find-payment-check', [PaymentCheckController::class, 'find'])->name('find-payment-check');
    Route::post('get-payment-check', [PaymentCheckController::class, 'getPaymentCheck'])->name('get-payment-check');

    Route::get('add-payment-check', [PaymentCheckController::class, 'create'])->name('add-payment-check');
    Route::post('store-payment-check', [PaymentCheckController::class, 'store'])->name('store-payment-check');
    Route::get('payment-check/{id}/edit', [PaymentCheckController::class, 'edit'])->name('edit-payment-check');
    Route::post('update-payment-check', [PaymentCheckController::class, 'update'])->name('update-payment-check');
    Route::post('destroy-payment-check', [PaymentCheckController::class, 'destroy'])->name('destroy-payment-check');
    Route::get('payment-check/trashed', [PaymentCheckController::class, 'trashed'])->name('trashed-payment-check');
    Route::post('payment-check/restore/{id}', [PaymentCheckController::class, 'restore'])->name('restore-payment-check');
    Route::delete('payment-check/force-delete/{id}', [PaymentCheckController::class, 'forceDelete'])->name('force-delete-payment-check');

    Route::get('show-bank', [BankController::class, 'index'])->name('show-bank');
    Route::get('add-bank', [BankController::class, 'create'])->name('add-bank');
    Route::post('store-bank', [BankController::class, 'store'])->name('store-bank');
    Route::get('bank/{id}/edit', [BankController::class, 'edit'])->name('edit-bank');
    Route::put('update-bank{id}', [BankController::class, 'update'])->name('update-bank');
    Route::post('destroy-bank', [BankController::class, 'destroy'])->name('destroy-bank');
    Route::get('banks/trashed', [BankController::class, 'trashed'])->name('trashed-banks');
    Route::post('banks/restore/{id}', [BankController::class, 'restore'])->name('restore-bank');
    Route::delete('banks/force-delete/{id}', [BankController::class, 'forceDelete'])->name('force-delete-bank');

    Route::get('show-commission', [CommissionController::class, 'index'])->name('show-commission');
    Route::get('add-commission', [CommissionController::class, 'create'])->name('add-commission');
    Route::post('store-commission', [CommissionController::class, 'store'])->name('store-commission');
    Route::get('commission/{id}/edit', [CommissionController::class, 'edit'])->name('edit-commission');
    Route::put('update-commission{id}', [CommissionController::class, 'update'])->name('update-commission');
    Route::post('destroy-commission', [CommissionController::class, 'destroy'])->name('destroy-commission');
    Route::get('commissions/trashed', [CommissionController::class, 'trashed'])->name('trashed-commissions');
    Route::post('commissions/restore/{id}', [CommissionController::class, 'restore'])->name('restore-commission');
    Route::delete('commissions/force-delete/{id}', [CommissionController::class, 'forceDelete'])->name('force-delete-commission');

    Route::get('show-reminder', [ReminderController::class, 'index'])->name('show-reminder');
    Route::get('add-reminder', [ReminderController::class, 'create'])->name('add-reminder');
    Route::post('store-reminder', [ReminderController::class, 'store'])->name('store-reminder');
    Route::get('reminder/{id}/edit', [ReminderController::class, 'edit'])->name('edit-reminder');
    Route::put('update-reminder{id}', [ReminderController::class, 'update'])->name('update-reminder');
    Route::post('destroy-reminder', [ReminderController::class, 'destroy'])->name('destroy-reminder');
    Route::get('reminders/trashed', [ReminderController::class, 'trashed'])->name('trashed-reminders');
    Route::post('reminders/restore/{id}', [ReminderController::class, 'restore'])->name('restore-reminder');
    Route::delete('reminders/force-delete/{id}', [ReminderController::class, 'forceDelete'])->name('force-delete-reminder');

    // Check Register
    Route::get('check-register', [PaymentCheckController::class, 'checkRegister'])->name('check-register');
    Route::get('get-check-register', [PaymentCheckController::class, 'getCheckRegister'])->name('get-check-register');

    // Quote Sheet
    Route::get('policy-type-quote', [ClientController::class, 'showQuotePolicyType'])->name('policy-type-quote');
    Route::get('show-client-quote', [ClientController::class, 'indexQuote'])->name('show-client-quote');
    Route::get('add-client-quote', [ClientController::class, 'createQuote'])->name('add-client-quote');
    Route::post('store-client-quote', [ClientController::class, 'storeQuote'])->name('store-client-quote');



    Route::get('view/form/{type}', [FormsController::class, 'viewForm'])->name('view.form');
    Route::get('show/form/{id}/{type}', [FormsController::class, 'showForm'])->name('show.form');

    // Agent Broker Form
    Route::get('agent/broker/form/{id}/create', [FormsController::class, 'createAgentBrokerForm'])->name('create-agent/broker-form');
    Route::post('store-agentBrokerForm', [FormsController::class, 'storeAgentBrokerForm'])->name('store-agentBrokerForm');
    // Additional Remarks From
    Route::get('additional/remarks/form/{id}/create', [FormsController::class, 'CreateAdditionalRemarksForm'])->name('create-additional/remarks-form');
    Route::post('store-additionalRemarks', [FormsController::class, 'storeAdditionalRemarksForm'])->name('store-additionalRemarks');
// Additional Remarks From
    Route::get('evidence/of/property/form/{id}/create', [FormsController::class, 'CreateEvidenceOfPropertyForm'])->name('create-evidence/of/property-form');
    Route::post('store-evidence/of/property', [FormsController::class, 'storeEvidenceOfProperty'])->name('store-evidence/of/property');

    // Invoice Fro Payment
    Route::get('invoice/for/payment/form/{id}/create', [FormsController::class, 'CreateInvoiceForPaymentForm'])->name('create-invoice-for-payment-form');
    Route::post('store/invoice/for/payment', [FormsController::class, 'storeInvoiceForPayment'])->name('store-invoice-for-payment');

    // Property OF Loss Notice
    Route::get('property/loss/form/{id}/create', [FormsController::class, 'CreatePropertyLossForm'])->name('create-property-loss-form');
    Route::post('store/property/loss', [FormsController::class, 'storePropertyLoss'])->name('store-property-loss');

    // Certificate Of Property Insurance
    Route::get('property/insurance/form/{id}/create', [FormsController::class, 'CreatePropertyInsuranceForm'])->name('create-property-insurance-form');
    Route::post('store/property/insurance', [FormsController::class, 'storePropertyInsurance'])->name('store-property-insurance');

    // Certificate Of Liability Insurance
    Route::get('liability/insurance/form/{id}/create', [FormsController::class, 'CreateLiabilityInsuranceForm'])->name('create-liability-insurance-form');
    Route::post('store/liability/insurance', [FormsController::class, 'storeLiabilityInsurance'])->name('store-liability-insurance');

    // INSURANCE IDENTIFICATION CARD
    Route::get('insurance/card/form/{id}/create', [FormsController::class, 'CreateInsuranceCardForm'])->name('create-insurance-card-form');
    Route::post('store/insurance/card', [FormsController::class, 'storeInsuranceCardForm'])->name('store-insurance-card');

    // COMMERCIAL GENERAL LIABILITY SECTION
    Route::get('general/liability/form/{id}/create', [FormsController::class, 'CreateGeneralLiabilityForm'])->name('create-general-liability-form');
    Route::post('store/general/liability', [FormsController::class, 'storeGeneralLiabilityForm'])->name('store-general-liability');


});
