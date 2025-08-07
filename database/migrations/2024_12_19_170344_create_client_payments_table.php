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
            $table->string('initial_premium')->nullable();
            $table->string('prorated_endorsement')->nullable();
            $table->string('premium_addon')->nullable();
            $table->string('company_fee')->nullable();
            $table->string('agency_fee')->nullable();
            $table->string('total_prorated')->nullable();

            $table->string('down_payment')->nullable();
            $table->string('monthly_payment')->nullable();
            $table->string('initial_agency_commission')->nullable();
            $table->string('primary_agency_commission')->nullable();
            $table->string('secondary_agency_commission')->nullable();

            $table->string('total_premium')->nullable();
            $table->string('total_company_fee')->nullable();
            $table->string('total_agency_fee')->nullable();
            $table->string('total')->nullable();

            $table->string('payment_option')->nullable();
            $table->string('payment_due_days')->nullable();

            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->unsignedBigInteger('financial_company_id')->nullable();

            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('financial_company_id')->references('id')->on('financial_companies')->onDelete('cascade');


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
