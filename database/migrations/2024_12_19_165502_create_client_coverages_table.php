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
        Schema::create('client_coverages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('body_injury')->nullable();
            $table->string('property_damage')->nullable();
            $table->string('medical_payments')->nullable();
            $table->string('pip')->nullable();
            $table->string('uninsured_body_injury')->nullable();
            $table->string('uninsured_property_damage')->nullable();
            $table->string('under_insured_body_injury')->nullable();
            $table->string('under_insured_property_damage')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_coverages');
    }
};
