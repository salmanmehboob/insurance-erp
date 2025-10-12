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
        Schema::create('property_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->text('invoice_date')->nullable();                
            $table->text('agency_name')->nullable();                
            $table->text('career')->nullable();                
            $table->text('naic_code')->nullable();                
            $table->text('policy_no')->nullable();                
            $table->text('effective_date')->nullable();                
            $table->text('named_insured')->nullable();                
            $table->text('blkt_s1_r1')->nullable();                
            $table->text('amount_s1_r1')->nullable();                
            $table->text('type_s1_r1')->nullable();                
            $table->text('blkt_s2_r1')->nullable();                
            $table->text('amount_s2_r1')->nullable();                
            $table->text('type_s2_r1')->nullable();      
            $table->text('blkt_s1_r2')->nullable();                
            $table->text('amount_s1_r2')->nullable();                
            $table->text('type_s1_r2')->nullable();                
            $table->text('blkt_s2_r2')->nullable();                
            $table->text('amount_s2_r2')->nullable();                
            $table->text('type_s2_r2')->nullable();
            
            $table->text('sec2_agencyId')->nullable();
            $table->text('remarks')->nullable();
            $table->text('producerSignature')->nullable();
            $table->text('producerName')->nullable();
            $table->text('producerLicense')->nullable();
            $table->text('applicantSignature')->nullable();
            $table->text('applicationDate')->nullable();
            $table->text('nationalProducerNo')->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_section');
    }
};
