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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('agency_name'); // Name of the agency
            $table->text('address')->nullable(); // Agency address
            $table->string('city'); // City
            $table->unsignedBigInteger('state_id'); // Foreign key to US states
            $table->string('zip_code', 10); // Zip code
            $table->string('phone', 15); // Primary phone
            $table->string('secondary_phone', 15)->nullable(); // Secondary phone
            $table->string('fax', 15)->nullable(); // Fax
            $table->string('account_number')->nullable(); // Account number
            $table->unsignedBigInteger('bank_id');
            $table->text('custom_message')->nullable(); // Custom message
            $table->string('logo')->nullable(); // Logo file path or URL
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Soft delete timestamp

            // Foreign key constraint
            $table->foreign('state_id')->references('id')->on('us_states')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('bank_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
