<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evidence_of_property_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('invoice_date')->nullable();

            $table->string('agency_name')->nullable();
            $table->string('agency_address')->nullable();
            $table->string('agency_city')->nullable();
            $table->string('agency_state')->nullable();
            $table->string('agency_zipcode')->nullable();
            $table->string('company_name')->nullable();
            $table->string('agency_phone')->nullable();
            $table->string('agency_fax')->nullable();
            $table->string('agency_email')->nullable();
            $table->string('agency_code')->nullable();
            $table->string('agency_subcode')->nullable();
            $table->string('agency_customer_id')->nullable();

            $table->string('loan_number')->nullable();
            $table->string('policy_number')->nullable();

            $table->string('insured_name')->nullable();
            $table->string('insured_address')->nullable();
            $table->string('insured_city')->nullable();
            $table->string('insured_state')->nullable();
            $table->string('insured_zipcode')->nullable();

            $table->string('effective_date')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('is_terminated')->nullable();
            $table->string('evidence_date')->nullable();

            $table->longText('property_information')->nullable();
            $table->string('is_perlis')->nullable();
            $table->string('is_basic')->nullable();
            $table->string('is_broad')->nullable();
            $table->string('is_special')->nullable();
            $table->longText('location_description')->nullable();
            $table->string('coverage')->nullable();
            $table->string('amount')->nullable();
            $table->string('deductible')->nullable();
            $table->longText('remarks')->nullable();

            $table->string('additional_interest_name')->nullable();
            $table->string('additional_interest_address')->nullable();
            $table->string('additional_interest_city')->nullable();
            $table->string('additional_interest_state')->nullable();
            $table->string('additional_interest_zipcode')->nullable();
            $table->string('additional_insured')->nullable();
            $table->string('lenders_loss_payable')->nullable();
            $table->string('loss_payee')->nullable();
            $table->string('mortgagee')->nullable();
            $table->string('additional_interest_loan')->nullable();
            $table->string('authorized_representative')->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence_of_property_forms');
    }
};
