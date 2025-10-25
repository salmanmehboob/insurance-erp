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
        Schema::create('dwelling_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('applicant_agency_name')->nullable();
            $table->text('applicant_agency_address')->nullable();
            $table->text('applicant_agency_city')->nullable();
            $table->text('applicant_agency_state')->nullable();
            $table->text('applicant_agency_zipCode')->nullable();
            $table->text('applicant_birthday')->nullable();
            $table->text('applicant_socialSecurity')->nullable();
            $table->text('applicant_maritalStatus')->nullable();
            $table->text('applicant_primaryPhone')->nullable();
            $table->text('applicant_primaryhome')->nullable();
            $table->text('applicant_primarybuss')->nullable();
            $table->text('applicant_primarycell')->nullable();
            $table->text('applicant_secondaryPhone')->nullable();
            $table->text('applicant_secondaryhome')->nullable();
            $table->text('applicant_secondarybuss')->nullable();
            $table->text('applicant_secondarycell')->nullable();
            $table->text('applicant_previousAddress')->nullable();
            $table->text('applicant_yearPreviousAdd')->nullable();
            $table->text('applicant_occupation')->nullable();
            $table->text('applicant_mailingName')->nullable();
            $table->text('applicant_mailingaddress')->nullable();
            $table->text('applicant_mailing_city')->nullable();
            $table->text('applicant_mailing_state')->nullable();
            $table->text('applicant_mailing_zipCode')->nullable();
            $table->text('applicant_mailingdate')->nullable();
            $table->text('applicant_mailingPrimaryEmail')->nullable();
            $table->text('applicant_mailingSecondaryEmail')->nullable();
            $table->text('dwellingLocationCheck')->nullable();
            $table->text('applicant_yearCurrentOc')->nullable();
            $table->text('applicant_yearWCEmployeer')->nullable();
            $table->text('applicant_yearWPEmployeer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_applicants');
    }
};
