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
        Schema::create('property_loss', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('agency_name');
            $table->string('agency_phone');
            $table->string('agency_fax');
            $table->string('agency_address');
            $table->string('agency_city');
            $table->string('agency_state');
            $table->string('agency_zipcode');

            $table->string('location_code');
            $table->string('date_of_loss');
            $table->string('time_of_loss');

            $table->string('property_carrier');
            $table->string('property_naic_code');
            $table->string('property_policy_number');
            $table->string('property_business');

            $table->string('flood_carrier');
            $table->string('flood_naic_code');
            $table->string('flood_policy_number');

            $table->string('wind_carrier');
            $table->string('wind_naic_code');
            $table->string('wind_policy_number');

            $table->string('insured_name');
            $table->string('insured_address');
            $table->string('insured_city');
            $table->string('insured_state');
            $table->string('insured_zipcode');
            $table->string('insured_dob');
            $table->string('insured_fein')->nullable();
            $table->string('insured_marital_status');
            $table->string('insured_phone_primary');
            $table->string('insured_phone_secondary');
            $table->string('insured_email_primary');
            $table->string('insured_email_secondary');

            $table->string('spouse_name');
            $table->string('spouse_address');
            $table->string('spouse_city');
            $table->string('spouse_state');
            $table->string('spouse_zipcode');
            $table->string('spouse_dob');
            $table->string('spouse_fein')->nullable();
            $table->string('spouse_marital_status');
            $table->string('spouse_phone_primary');
            $table->string('spouse_phone_secondary');
            $table->string('spouse_email_primary');
            $table->string('spouse_email_secondary');

            $table->string('contact_name');
            $table->string('contact_address');
            $table->string('contact_city');
            $table->string('contact_state');
            $table->string('contact_zipcode');
            $table->string('contact_when');
            $table->string('contact_phone_primary');
            $table->string('contact_phone_secondary');
            $table->string('contact_email_primary');
            $table->string('contact_email_secondary');

            $table->string('loss_address');
            $table->string('loss_city');
            $table->string('loss_state');
            $table->string('loss_zipcode');
            $table->string('loss_country');
            $table->string('loss_police_contact');
            $table->string('loss_police_report');
            $table->string('loss_location');
            $table->string('loss_type');
            $table->string('loss_amount');
            $table->longText('loss_description');

            $table->string('report_by');
            $table->string('report_to');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_loss');
    }
};
