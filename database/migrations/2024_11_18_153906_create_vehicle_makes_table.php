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
        Schema::create('vehicle_makes', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('name')->unique(); // Make name (e.g., Toyota, Ford)
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Deleted timestamp for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_makes');
    }
};
