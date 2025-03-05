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
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('insurance_company_id');
            $table->string('code')->nullable();
            $table->string('sub_code')->nullable();
            $table->string('current_agency')->nullable();
            $table->string('current_producer')->nullable();
            $table->string('agency_customer_id')->nullable();
            $table->string('clients_ids');
            $table->unsignedBigInteger('created_by');
            $table->date('creation_date');
            $table->string('insured_signature')->nullable();
            $table->date('issued_date');
            $table->string('insured_title')->nullable();
            $table->string('insured_company_name')->nullable();
            $table->string('insured_company_address')->nullable();
            $table->string('insured_company_city')->nullable();
            $table->string('insured_company_state')->nullable();
            $table->string('insured_company_zipcode')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
