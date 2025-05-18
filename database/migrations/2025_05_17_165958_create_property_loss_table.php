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
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->string('invoice_date', 100)->nullable();
            $table->string('agency_name', 150)->nullable();
            $table->text('agency_address')->nullable();
            $table->string('agency_city', 100)->nullable();
            $table->string('agency_state', 100)->nullable();
            $table->string('agency_zipcode', 20)->nullable();
            $table->string('agency_phone', 20)->nullable();
            $table->string('agency_contact_name', 150)->nullable();
            $table->string('agency_fax', 20)->nullable();
            $table->string('agency_email', 150)->nullable();
            $table->text('agency_code')->nullable();
            $table->text('agency_sub_code')->nullable();
            $table->text('agency_customer_id')->nullable();

            $table->text('location_code')->nullable();
            $table->string('date_of_loss',100)->nullable();
            $table->string('time_of_loss',100)->nullable();

            $table->string('property_carrier', 150)->nullable();
            $table->string('property_naic_code', 50)->nullable();
            $table->text('property_policy_number')->nullable();
            $table->string('property_business', 150)->nullable();

            $table->string('flood_carrier', 150)->nullable();
            $table->string('flood_naic_code', 50)->nullable();
            $table->text('flood_policy_number')->nullable();

            $table->string('wind_carrier', 150)->nullable();
            $table->string('wind_naic_code', 50)->nullable();
            $table->text('wind_policy_number')->nullable();

            $table->string('insured_name', 150)->nullable();
            $table->text('insured_address')->nullable();
            $table->string('insured_city', 100)->nullable();
            $table->string('insured_state', 100)->nullable();
            $table->string('insured_zipcode', 20)->nullable();
            $table->string('insured_dob',100)->nullable();
            $table->string('insured_fein', 50)->nullable();
            $table->string('insured_marital_status', 50)->nullable();
            $table->string('insured_phone_primary', 20)->nullable();
            $table->string('insured_phone_primary_type', 50)->nullable();
            $table->string('insured_phone_secondary', 20)->nullable();
            $table->string('insured_phone_secondary_type', 50)->nullable();
            $table->text('insured_email_primary')->nullable();
            $table->text('insured_email_secondary')->nullable();

            $table->string('spouse_name', 150)->nullable();
            $table->text('spouse_address')->nullable();
            $table->string('spouse_city', 100)->nullable();
            $table->string('spouse_state', 100)->nullable();
            $table->string('spouse_zipcode', 20)->nullable();
            $table->string('spouse_dob',100)->nullable();
            $table->string('spouse_fein', 50)->nullable();
            $table->string('spouse_marital_status', 50)->nullable();
            $table->string('spouse_phone_primary', 20)->nullable();
            $table->string('spouse_phone_primary_type', 50)->nullable();
            $table->string('spouse_phone_secondary', 20)->nullable();
            $table->string('spouse_phone_secondary_type', 50)->nullable();
            $table->text('spouse_email_primary')->nullable();
            $table->text('spouse_email_secondary')->nullable();

            $table->string('contact_name', 150)->nullable();
            $table->text('contact_address')->nullable();
            $table->string('contact_city', 100)->nullable();
            $table->string('contact_state', 100)->nullable();
            $table->string('contact_zipcode', 20)->nullable();
            $table->string('contact_when', 100)->nullable();
            $table->string('contact_phone_primary', 20)->nullable();
            $table->string('contact_phone_primary_type', 50)->nullable();
            $table->string('contact_phone_secondary', 20)->nullable();
            $table->string('contact_phone_secondary_type', 50)->nullable();
            $table->text('contact_email_primary')->nullable();
            $table->text('contact_email_secondary')->nullable();

            $table->text('loss_address')->nullable();
            $table->string('loss_city', 100)->nullable();
            $table->string('loss_state', 100)->nullable();
            $table->string('loss_zipcode', 20)->nullable();
            $table->string('loss_country', 100)->nullable();
            $table->text('loss_police_contact')->nullable();
            $table->text('loss_police_report')->nullable();
            $table->text('loss_location')->nullable();
            $table->string('loss_type', 100)->nullable();
            $table->text('loss_type_other')->nullable();
            $table->text('loss_amount')->nullable();
            $table->longText('loss_description')->nullable();

            $table->string('report_by', 150)->nullable();
            $table->string('report_to', 150)->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
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
