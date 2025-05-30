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
            Schema::create('insurance_application_business', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insurance_application_id')->constrained('insurance_applications')->onDelete('cascade');

            $table->string('business_boiler', 50)->nullable();
            $table->string('business_boiler_limit', 50)->nullable();

            $table->string('business_auto', 50)->nullable();
            $table->string('business_auto_limit', 50)->nullable();

            $table->string('business_owner', 50)->nullable();
            $table->string('business_owner_limit', 50)->nullable();

            $table->string('business_commercial_gl', 50)->nullable();
            $table->string('business_commercial_gl_limit', 50)->nullable();

            $table->string('business_inland', 50)->nullable();
            $table->string('business_inland_limit', 50)->nullable();

            $table->string('business_property', 50)->nullable();
            $table->string('business_property_limit', 50)->nullable();

            $table->string('business_crime', 50)->nullable();
            $table->string('business_crime_limit', 50)->nullable();

            $table->string('business_cyber', 50)->nullable();
            $table->string('business_cyber_limit', 50)->nullable();

            $table->string('business_fiduciary', 50)->nullable();
            $table->string('business_fiduciary_limit', 50)->nullable();

            $table->string('business_garage', 50)->nullable();
            $table->string('business_garage_limit', 50)->nullable();

            $table->string('business_liquor', 50)->nullable();
            $table->string('business_liquor_limit', 50)->nullable();

            $table->string('business_motor', 50)->nullable();
            $table->string('business_motor_limit', 50)->nullable();

            $table->string('business_trucker', 50)->nullable();
            $table->string('business_trucker_limit', 50)->nullable();

            $table->string('business_umbrella', 50)->nullable();
            $table->string('business_umbrella_limit', 50)->nullable();

            $table->string('business_yacht', 50)->nullable();
            $table->string('business_yacht_limit', 50)->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_allication_business');
    }
};
