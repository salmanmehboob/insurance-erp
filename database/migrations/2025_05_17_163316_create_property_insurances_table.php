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
        Schema::create('property_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('producer_name');
            $table->string('producer_phone');
            $table->string('producer_fax');
            $table->string('producer_address');
            $table->string('producer_city');
            $table->string('producer_state');
            $table->string('producer_zipcode');

            $table->string('contact_name');
            $table->string('phone_no');
            $table->string('fax_no');
            $table->string('email');
            $table->string('producer_customer_id');

            $table->string('insured_name');
            $table->string('insured_phone');
            $table->string('insured_fax');
            $table->string('insured_address');
            $table->string('insured_city');
            $table->string('insured_state');
            $table->string('insured_zipcode');

            $table->string('coverages');
            $table->string('certificate_no');
            $table->string('revision_no');
            $table->string('description');
            $table->string('other_coverage');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_insurances');
    }
};
