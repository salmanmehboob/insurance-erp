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
        Schema::create('dwelling_coverages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('coverage_fire')->nullable();
            $table->text('coverage_fireEC')->nullable();
            $table->text('coverage_fireECVM')->nullable();
            $table->text('coverage_broad')->nullable();
            $table->text('coverage_special')->nullable();
            $table->text('coverage_s1_limit')->nullable();
            $table->text('coverage_s1_premium')->nullable();
            $table->text('coverage_s1_option_check')->nullable();
            $table->text('coverage_s1s_limits')->nullable();
            $table->text('coverage_s1s_premium')->nullable();
            $table->text('coverage_s2_option_check')->nullable();
            $table->text('coverage_s2_option_checkField')->nullable();
            $table->text('coverage_s2_prem')->nullable();
            $table->text('coverage_s2s_option_check')->nullable();
            $table->text('coverage_s2s_prem')->nullable();
            $table->text('coverage_s3_option_check')->nullable();
            $table->text('coverage_s3_prem')->nullable();
            $table->text('coverage_s4_prem')->nullable();
            $table->text('coverage_s5_prem')->nullable();
            $table->text('totalPremLocation')->nullable();
            $table->text('lossUse_sustained')->nullable();
            $table->text('lossUse_sustainedamount')->nullable();
            $table->text('lossUse_prem')->nullable();
            $table->text('base_s1_amount')->nullable();
            $table->text('base_s1_percent')->nullable();
            $table->text('base_s1_type')->nullable();
            $table->text('base_s2_amount')->nullable();
            $table->text('base_s2_percent')->nullable();
            $table->text('base_s2_type')->nullable();
            $table->text('wind_s1_amount')->nullable();
            $table->text('wind_s1_percent')->nullable();
            $table->text('wind_s1_type')->nullable();
            $table->text('wind_s2_amount')->nullable();
            $table->text('wind_s2_percent')->nullable();
            $table->text('wind_s2_type')->nullable();
            $table->text('theift_s1_amount')->nullable();
            $table->text('theift_s1_percent')->nullable();
            $table->text('theift_s1_type')->nullable();
            $table->text('theift_s1_other')->nullable();
            $table->text('theift_s2_amount')->nullable();
            $table->text('theift_s2_percent')->nullable();
            $table->text('theift_s2_type')->nullable();
            $table->text('otherR1_s1_title')->nullable();
            $table->text('otherR1_s1_amount')->nullable();
            $table->text('otherR1_s1_percent')->nullable();
            $table->text('otherR1_s1_type')->nullable();
            $table->text('otherR1_s1_other')->nullable();
            $table->text('otherR1_s2_amount')->nullable();
            $table->text('otherR1_s2_percent')->nullable();
            $table->text('otherR1_s2_type')->nullable();
            $table->text('otherR2_s1_title')->nullable();
            $table->text('otherR2_s1_amount')->nullable();
            $table->text('otherR2_s1_percent')->nullable();
            $table->text('otherR2_s1_type')->nullable();
            $table->text('otherR2_s1_other')->nullable();
            $table->text('otherR2_s2_amount')->nullable();
            $table->text('otherR2_s2_percent')->nullable();
            $table->text('otherR2_s2_type')->nullable();
            $table->text('otherR3_s1_title')->nullable();
            $table->text('otherR3_s1_amount')->nullable();
            $table->text('otherR3_s1_percent')->nullable();
            $table->text('otherR3_s1_type')->nullable();
            $table->text('includedDwellingStructure')->nullable();
            $table->text('blanket_limit')->nullable();
            $table->text('blanket_prem')->nullable();
            $table->text('rental_limit_check')->nullable();
            $table->text('rental_limit_checkField')->nullable();
            $table->text('rental_prem')->nullable();
            $table->text('addition_limit')->nullable();
            $table->text('addition_prem')->nullable();
            $table->text('personalLib_limit')->nullable();
            $table->text('personalLib_prem')->nullable();
            $table->text('medicalPay_limit')->nullable();
            $table->text('medicalPay_prem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_coverages');
    }
};
