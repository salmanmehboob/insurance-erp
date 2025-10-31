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
        Schema::create('dwelling_fire_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->text('invoideDate')->nullable();
            $table->text('agency_name')->nullable();
            $table->text('agency_address')->nullable();
            $table->text('agency_city')->nullable();
            $table->text('agency_state')->nullable();
            $table->text('agency_zipCode')->nullable();
            $table->text('contact_name')->nullable();
            $table->text('contact_phone')->nullable();
            $table->text('contact_fax')->nullable();
            $table->text('contact_email')->nullable();
            $table->text('code')->nullable();
            $table->text('subcode')->nullable();
            $table->text('agency_cust_id')->nullable();
            $table->text('carier')->nullable();
            $table->text('naicCode')->nullable();
            $table->text('nameIsured')->nullable();
            $table->text('policyNumber')->nullable();
            $table->text('plan')->nullable();
            $table->text('facilityCode')->nullable();
            $table->text('expirationDate')->nullable();
            $table->text('effectiveDate')->nullable();
            $table->text('dateAgentLastInspect')->nullable();
            $table->text('knownApplicant')->nullable();         
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_fire_application');
    }
};
