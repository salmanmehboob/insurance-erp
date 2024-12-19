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
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('initial_premium');
            $table->string('prorated_endorsement');
            $table->string('premium_addon');
            $table->string('company_fee');
            $table->string('agency_fee');
            $table->string('total_prorated');

            $table->string('down_payment');
            $table->string('monthly_payment');
            $table->string('initial_agency_commission');
            $table->string('primary_agency_commission');
            $table->string('secondary_agency_commission');

            $table->string('total_premium');
            $table->string('total_company_fee');
            $table->string('total_agency_fee');
            $table->string('total');

            $table->string('payment_option');
            $table->string('payment_due_days');

            $table->unsignedBigInteger('insurance_company_id');




            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_payments');
    }
};
