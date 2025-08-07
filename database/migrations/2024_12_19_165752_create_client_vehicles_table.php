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
        Schema::create('client_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('vin')->nullable();
            $table->unsignedBigInteger('year_id')->nullable();
            $table->unsignedBigInteger('vehicle_make_id')->nullable();
            $table->unsignedBigInteger('vehicle_model_id')->nullable();
            $table->string('comprehensive')->nullable();
            $table->string('collision')->nullable();
            $table->string('rental')->nullable();
            $table->string('towing')->nullable();
            $table->string('custom_equipment')->nullable();

            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->foreign('vehicle_make_id')->references('id')->on('vehicle_makes')->onDelete('cascade');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_vehicles');
    }
};
