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
            $table->string('dwelling_building')->nullable();
            $table->string('liability_limit')->nullable();
            $table->string('contents')->nullable();
            $table->string('medical_payment')->nullable();
            $table->string('additional_structure')->nullable();
            $table->string('deductible')->nullable();
            $table->string('loss_of_use')->nullable();

            $table->string('usage')->nullable();
            $table->string('construction')->nullable();
            $table->string('built_year')->nullable();
            $table->string('square_footage')->nullable();
                    $table->string('rooms')->nullable();
            $table->string('age_of_roof')->nullable();

            $table->boolean('is_intrusion_alarm')->nullable();
            $table->boolean('is_fire_station')->nullable();
            $table->boolean('is_swimming_pool')->nullable();
            $table->boolean('is_replacement_cost')->nullable();
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
