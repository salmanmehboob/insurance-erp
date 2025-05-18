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
            $table->string('invoice_date');

            $table->string('agency_name');
            $table->string('agency_address');
            $table->string('agency_city');
            $table->string('agency_state');
            $table->string('agency_zipcode');
            $table->string('company_name');
            $table->string('agency_phone');
            $table->string('agency_fax');
            $table->string('agency_email');
            $table->string('agency_code')->nullable();
            $table->string('agency_subcode')->nullable();
            $table->string('agency_customer_id')->nullable();

            $table->string('loan_no')->nullable();
            $table->string('policy_number')->nullable();

            $table->string('insured_name');
            $table->string('insured_address');
            $table->string('insured_city');
            $table->string('insured_state');
            $table->string('insured_zipcode');

            $table->string('effective_date');
            $table->string('expiration_date');
            $table->string('is_terminated');
            $table->string('evidence_date');

            $table->longText('property_information')->nullable();
            $table->string('is_basic');
            $table->string('is_broad');
            $table->string('is_special');
            $table->longText('coverage_description')->nullable();
            $table->string('coverage');
            $table->string('amount');
            $table->string('deductible');
            $table->longText('remarks')->nullable();

            $table->string('additional_interest_name');
            $table->string('additional_interest_address');
            $table->string('additional_interest_city');
            $table->string('additional_interest_state');
            $table->string('additional_interest_zipcode');
            $table->string('additional_insured');
            $table->string('lenders_loss_payable');
            $table->string('loss_payee');
            $table->string('mortgagee');
            $table->string('additional_interest_loan');
            $table->string('representative_name');
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
