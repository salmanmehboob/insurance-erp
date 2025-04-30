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
        Schema::create('agent_broker_forms', function (Blueprint $table) {
            $table->id();
            $table->date('creation_date');

            $table->string('agency_name');
            $table->string('agency_phone');
            $table->string('agency_fax');
            $table->string('agency_address');
            $table->string('agency_city');
            $table->string('agency_state');
            $table->string('agency_zipcode');

            $table->string('insurance_company_name');
             $table->string('insurance_company_address');
            $table->string('insurance_company_city');
            $table->string('insurance_company_state');
            $table->string('insurance_company_zipcode');
            $table->string('current_agency')->nullable();
            $table->string('current_producer')->nullable();

            $table->string('email')->nullable();
            $table->string('code')->nullable();
            $table->string('sub_code')->nullable();
            $table->string('agency_customer_id')->nullable();

            $table->string('advice_producer_name');
            $table->date('advice_producer_effective_date');

            $table->string('insured_signature')->nullable();
            $table->date('issued_date');
            $table->string('insured_title')->nullable();
            $table->string('insured_company_name')->nullable();
            $table->string('insured_company_address')->nullable();
            $table->string('insured_company_city')->nullable();
            $table->string('insured_company_state')->nullable();
            $table->string('insured_company_zipcode')->nullable();
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
        Schema::dropIfExists('agent_broker_forms');
    }
};
