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
        Schema::create('insurance_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->string('invoice_date', 50)->nullable();
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
            $table->string('program_name', 50)->nullable();
            $table->string('program_code', 50)->nullable();
            $table->string('policy_number', 50)->nullable();
            $table->string('under_writer', 50)->nullable();
            $table->string('under_writer_office', 50)->nullable();

            $table->tinyInteger('status_quote')->nullable();
            $table->tinyInteger('status_bound')->nullable();
            $table->tinyInteger('status_change')->nullable();
            $table->tinyInteger('status_cancel')->nullable();
            $table->tinyInteger('status_issue_policy')->nullable();
            $table->tinyInteger('status_renew')->nullable();
            $table->string('status_date', 50)->nullable();
            $table->string('status_time', 50)->nullable();


            $table->tinyInteger('signature_notice')->nullable();
            $table->string('applicant', 50)->nullable();
            $table->string('procedure_signature', 50)->nullable();
            $table->string('procedure_name', 50)->nullable();
            $table->string('procedure_license', 50)->nullable();
            $table->string('applicant_signature', 50)->nullable();
            $table->string('applicant_date', 50)->nullable();
            $table->string('procedure_no', 50)->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_applications');
    }
};
