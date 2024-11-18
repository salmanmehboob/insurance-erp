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
        Schema::create('policy_statuses', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('name')->unique(); // Status name (e.g., New Business, Approved)
            $table->timestamps(); // Created and Updated timestamps
            $table->softDeletes(); // Deleted timestamp for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_statuses');
    }
};
