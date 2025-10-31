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
        Schema::create('dwelling_prior_coverages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('prior_carrier')->nullable();
            $table->text('prior_policy')->nullable();
            $table->text('prior_expire')->nullable();
            $table->text('localHistory')->nullable();
            $table->text('applicantInitials')->nullable();
            $table->text('localHistory_s1_lossdate')->nullable();
            $table->text('localHistory_s1_losstype')->nullable();
            $table->text('localHistory_s1_desc')->nullable();
            $table->text('localHistory_s1_cat')->nullable();
            $table->text('localHistory_s1_amountP')->nullable();
            $table->text('localHistory_s1_enteredby')->nullable();
            $table->text('localHistory_s1_indespute')->nullable();
            $table->text('localHistory_s2_lossdate')->nullable();
            $table->text('localHistory_s2_losstype')->nullable();
            $table->text('localHistory_s2_desc')->nullable();
            $table->text('localHistory_s2_cat')->nullable();
            $table->text('localHistory_s2_amountP')->nullable();
            $table->text('localHistory_s2_enteredby')->nullable();
            $table->text('localHistory_s2_indespute')->nullable();
            $table->text('localHistory_s3_lossdate')->nullable();
            $table->text('localHistory_s3_losstype')->nullable();
            $table->text('localHistory_s3_desc')->nullable();
            $table->text('localHistory_s3_cat')->nullable();
            $table->text('localHistory_s3_amountP')->nullable();
            $table->text('localHistory_s3_enteredby')->nullable();
            $table->text('localHistory_s3_indespute')->nullable();
            $table->text('additionalINT_insured')->nullable();
            $table->text('additionalINT_lender')->nullable();
            $table->text('additionalINT_lienholder')->nullable();
            $table->text('additionalINT_loss')->nullable();
            $table->text('additionalINT_mortgagee')->nullable();
            $table->text('additionalINT_trustee')->nullable();
            $table->text('additionalINT_other')->nullable();
            $table->text('additionalINT_otherField')->nullable();
            $table->text('additionalINT_nameAddress')->nullable();
            $table->text('additionalINT_rank')->nullable();
            $table->text('additionalINT_certificate')->nullable();
            $table->text('additionalINT_sendEmail')->nullable();
            $table->text('additionalINT_loan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_prior_coverages');
    }
};
