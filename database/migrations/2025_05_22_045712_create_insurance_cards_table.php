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
        Schema::create('insurance_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->string('company_number', 50)->nullable();
            $table->string('company_name', 50)->nullable();
            $table->string('type', 50)->nullable();
            $table->string('policy_number', 50)->nullable();
            $table->string('effective_date', 50)->nullable();
            $table->string('expiration_date', 50)->nullable();
            $table->string('year', 50)->nullable();
            $table->string('make', 50)->nullable();
            $table->string('vehicle_number', 50)->nullable();

            $table->string('agency_name', 100)->nullable();
            $table->string('agency_address', 100)->nullable();
            $table->string('agency_city', 100)->nullable();
            $table->string('agency_state', 100)->nullable();
            $table->string('agency_zipcode', 100)->nullable();

            $table->string('insured_name', 100)->nullable();
            $table->string('insured_address', 100)->nullable();
            $table->string('insured_city', 100)->nullable();
            $table->string('insured_state', 100)->nullable();
            $table->string('insured_zipcode', 100)->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_cards');
    }
};
