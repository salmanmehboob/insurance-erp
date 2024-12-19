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
        Schema::create('client_house_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('dwelling_building');
            $table->string('liability_limit');
            $table->string('contents');
            $table->string('medical_payment');
            $table->string('additional_structure');
            $table->string('deductible');
            $table->string('loss_of_use');

            $table->string('usage');
            $table->string('construction');
            $table->string('built_year');
            $table->string('square_footage');
            $table->string('rooms');
            $table->string('age_of_roof');

            $table->boolean('is_intrusion_alarm');
            $table->boolean('is_fire_station');
            $table->boolean('is_swimming_pool');
            $table->boolean('is_replacement_cost');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_house_details');
    }
};
