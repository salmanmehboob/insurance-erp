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
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->unsignedBigInteger('make_id'); // Foreign key to vehicle_makes table
            $table->string('name'); // Model name (e.g., Corolla, Mustang)
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Deleted timestamp for soft deletes

            // Foreign key constraint
            $table->foreign('make_id')->references('id')->on('vehicle_makes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_models');
    }
};
