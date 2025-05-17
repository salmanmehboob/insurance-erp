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
        Schema::create('property_insurance_insurers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_insurance_id')->constrained('property_insurances')->onDelete('cascade');
            $table->string('company_name');
            $table->string('naic_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_insurance_insurers');
    }
};
