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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('account_holder_name'); // Account holder name
            $table->string('account_number')->unique(); // Account number
            $table->string('bank_name'); // Bank name
            $table->string('branch_name')->nullable(); // Bank branch name
            $table->string('ifsc_code')->nullable(); // Bank IFSC code
            $table->string('account_type')->nullable(); // Type (e.g., Savings, Current)
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Deleted timestamp for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
