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
        Schema::create('dewlling_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('application_loc_no',50)->nullable();
            $table->string('invoice_date',50)->nullable();
            $table->string('agency_name', 50)->nullable();
            $table->string('agency_address', 50)->nullable();
            $table->string('agency_city', 50)->nullable();
            $table->string('agency_state', 50)->nullable();
            $table->string('agency_zipcode', 50)->nullable();

            $table->string('contact_name', 50)->nullable();
            $table->string('contact_phone_no', 50)->nullable();
            $table->string('contact_fax_no', 50)->nullable();
            $table->string('contact_email', 50)->nullable();
            $table->string('code', 50)->nullable();
            $table->string('sub_code', 50)->nullable();
            $table->string('producer_customer_id', 50)->nullable();

            $table->string('carrier', 50)->nullable();
            $table->string('naic_code', 10)->nullable();
            $table->string('name_insured', 50)->nullable();
            $table->string('policy_number', 50)->nullable();
            $table->string('plan', 50)->nullable();
            $table->string('facility_code', 50)->nullable();
            $table->string('effective_date', 50)->nullable();
            $table->string('expiration_date', 50)->nullable();
            $table->string('last_inspected_date', 50)->nullable();
            $table->string('applicant_know', 50)->nullable();

            $table->string('applicant_name', 50)->nullable();
            $table->string('applicant_dob', 50)->nullable();
            $table->string('applicant_ssn', 50)->nullable();
            $table->string('applicant_marital_status', 50)->nullable();
            $table->string('applicant_mailing_address', 50)->nullable();
            $table->string('applicant_mailing_city', 50)->nullable();
            $table->string('applicant_mailing_state', 50)->nullable();
            $table->string('applicant_mailing_zipcode', 50)->nullable();
            $table->string('applicant_pp_type', 50)->nullable();
            $table->string('applicant_pp_no', 50)->nullable();
            $table->string('applicant_sp_type', 50)->nullable();
            $table->string('applicant_sp_no', 50)->nullable();


            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dewlling_applications');
    }
};
