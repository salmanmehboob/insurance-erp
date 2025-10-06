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
        Schema::create('cia_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commerical_appId')->constrained('commercial_insurance_applications')->onDelete('cascade');
            $table->text('lossHistory')->nullable();
            $table->text('totalLose')->nullable();
            $table->text('lossH_r1_dateOccup')->nullable();
            $table->text('lossH_r1_line')->nullable();
            $table->text('lossH_r1_type')->nullable();
            $table->text('lossH_r1_dateClaim')->nullable();
            $table->text('lossH_r1_amountPaid')->nullable();
            $table->text('lossH_r1_ammountReserved')->nullable();
            $table->text('lossH_r1_subro')->nullable();
            $table->text('lossH_r1_clainOpen')->nullable();
            $table->text('lossH_r2_dateOccup')->nullable();
            $table->text('lossH_r2_line')->nullable();
            $table->text('lossH_r2_type')->nullable();
            $table->text('lossH_r2_dateClaim')->nullable();
            $table->text('lossH_r2_amountPaid')->nullable();
            $table->text('lossH_r2_ammountReserved')->nullable();
            $table->text('lossH_r2_subro')->nullable();
            $table->text('lossH_r2_clainOpen')->nullable();
            $table->text('lossH_r3_dateOccup')->nullable();
            $table->text('lossH_r3_line')->nullable();
            $table->text('lossH_r3_type')->nullable();
            $table->text('lossH_r3_dateClaim')->nullable();
            $table->text('lossH_r3_amountPaid')->nullable();
            $table->text('lossH_r3_ammountReserved')->nullable();
            $table->text('lossH_r3_subro')->nullable();
            $table->text('lossH_r3_clainOpen')->nullable();
            $table->text('signatureCheck')->nullable();
            $table->text('applicantInitials')->nullable();
            $table->text('producerSign')->nullable();
            $table->text('producerName')->nullable();
            $table->text('stateProducerLicense')->nullable();
            $table->text('applicantSign')->nullable();
            $table->text('applicationDate')->nullable();
            $table->text('nationalProducer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cia_history');
    }
};
