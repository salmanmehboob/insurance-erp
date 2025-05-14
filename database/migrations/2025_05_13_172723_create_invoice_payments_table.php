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
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('agency_name');
            $table->string('agency_phone');
            $table->string('agency_fax');
            $table->string('agency_address');
            $table->string('agency_city');
            $table->string('agency_state');
            $table->string('agency_zipcode');

            $table->string('insured_company_name');
            $table->string('insured_company_address');
            $table->string('insured_company_city');
            $table->string('insured_company_state');
            $table->string('insured_company_zipcode');

            $table->string('company_name');
            $table->string('company_fax');
            $table->string('policy_number');
            $table->date('invoice_date');
            $table->string('total_amount');
            $table->longText('note');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_payments');
    }
};
