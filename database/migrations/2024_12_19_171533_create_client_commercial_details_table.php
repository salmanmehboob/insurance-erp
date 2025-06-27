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
        Schema::create('client_commercial_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->text('type_of_business')->nullable();
            $table->string('year_of_experience')->nullable();
            $table->string('special_license')->nullable();
            $table->string('employment_number')->nullable();
            $table->string('employment_payroll')->nullable();

            $table->string('current_inst')->nullable();
            $table->date('quote_expiry')->nullable();

            $table->string('building')->nullable();
            $table->string('contents')->nullable();
            $table->string('loss_of_earning')->nullable();
            $table->string('pump')->nullable();
            $table->string('sign')->nullable();
            $table->string('glass')->nullable();
                    $table->string('other_commercial_property')->nullable();

            $table->enum('property_owner',['owned','leased'])->nullable();
            $table->string('built_year')->nullable();
            $table->string('property_area')->nullable();
            $table->string('age_of_roof')->nullable();
            $table->string('construction')->nullable();
            $table->boolean('is_alarm_system')->nullable();


            $table->string('general_aggregate')->nullable();
            $table->string('product_aggregate')->nullable();
            $table->string('personal_injury')->nullable();
            $table->string('each_occurrence')->nullable();
            $table->string('fire_damage')->nullable();
            $table->string('medical_expense')->nullable();
            $table->string('annual_receipt')->nullable();

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_commercial_details');
    }
};
