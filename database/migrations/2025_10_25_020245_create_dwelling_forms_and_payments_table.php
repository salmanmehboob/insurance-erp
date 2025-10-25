<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dwelling_forms_and_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('paymentPlan_billing')->nullable();
            $table->text('paymentPlan_deposit')->nullable();
            $table->text('paymentPlan_estTotal')->nullable();
            $table->text('paymentPlan_directBillP')->nullable();
            $table->text('paymentPlan_fullPay')->nullable();
            $table->text('paymentPlan_BIMonthly')->nullable();
            $table->text('paymentPlan_cash')->nullable();
            $table->text('paymentPlan_EFT')->nullable();
            $table->text('paymentPlan_Agent')->nullable();
            $table->text('paymentPlan_directBillAcct')->nullable();
            $table->text('paymentPlan_annual')->nullable();
            $table->text('paymentPlan_monthly')->nullable();
            $table->text('paymentPlan_check')->nullable();
            $table->text('paymentPlan_payroll')->nullable();
            $table->text('paymentPlan_Insured')->nullable();
            $table->text('paymentPlan_agentBill')->nullable();
            $table->text('paymentPlan_semiAnnual')->nullable();
            $table->text('paymentPlan_other1Check')->nullable();
            $table->text('paymentPlan_other1CheckField')->nullable();
            $table->text('paymentPlan_creditCard')->nullable();
            $table->text('paymentPlan_preAuth')->nullable();
            $table->text('paymentPlan_other2Check')->nullable();
            $table->text('paymentPlan_other2CheckField')->nullable();
            $table->text('paymentPlan_quaterly')->nullable();
            $table->text('premium_financed')->nullable();
            $table->text('paymentPlan_financeCompany')->nullable();
            $table->text('prem_insured')->nullable();
            $table->text('prem_morg')->nullable();
            $table->text('prem_othCheck')->nullable();
            $table->text('prem_othCheckFiled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_forms_and_payments');
    }
};
