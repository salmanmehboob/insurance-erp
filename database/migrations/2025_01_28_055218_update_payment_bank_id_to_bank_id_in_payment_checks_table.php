<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payment_checks', function (Blueprint $table) {
            // Drop the old foreign key and column
            if (Schema::hasColumn('payment_checks', 'payment_bank_id')) {
                $table->dropForeign(['payment_bank_id']); // Drop the foreign key
                $table->dropColumn('payment_bank_id');    // Drop the column
            }

            // Add the new column and foreign key
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('bank_accounts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payment_checks', function (Blueprint $table) {
            // Check if the column 'bank_id' exists before attempting to drop it
            if (Schema::hasColumn('payment_checks', 'bank_id')) {
                $table->dropForeign(['bank_id']); // Drop the foreign key
                $table->dropColumn('bank_id');    // Drop the column
            }

            // Re-add the old column and foreign key if they were dropped
            if (!Schema::hasColumn('payment_checks', 'payment_bank_id')) {
                $table->unsignedBigInteger('payment_bank_id')->nullable(); // Nullable to avoid issues with existing rows
                $table->foreign('payment_bank_id')->references('id')->on('payment_banks')->onDelete('cascade');
            }
        });
    }
};
