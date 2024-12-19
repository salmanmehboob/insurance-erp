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
            $table->text('type_of_business');
            $table->string('year_of_experience');
            $table->string('special_license');
            $table->string('employment_number');
            $table->string('employment_payroll');

            $table->string('current_inst');
            $table->date('quote_expiry');

            $table->string('building');
            $table->string('contents');
            $table->string('loss_of_earning');
            $table->string('pump');
            $table->string('sign');
            $table->string('glass');

            $table->enum('property_owner',['owned','leased']);
            $table->string('built_year');
            $table->string('property_area');
            $table->string('age_of_roof');
            $table->string('construction');
            $table->boolean('is_alarm_system');


            $table->string('general_aggregate');
            $table->string('product_aggregate');
            $table->string('personal_injury');
            $table->string('each_occurrence');
            $table->string('fire_damage');
            $table->string('medical_expense');
            $table->string('annual_receipt');

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
