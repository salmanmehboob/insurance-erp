<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_commercial_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->text('general_liability')->nullable();

            $table->string('general_aggregate')->nullable();
            $table->string('product_aggregate')->nullable();
            $table->string('personal_injury')->nullable();
            $table->string('each_occurrence')->nullable();
            $table->string('fire_damage')->nullable();
            $table->string('medical_expense')->nullable();
            $table->string('annual_receipt')->nullable();

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_commercial_liabilities');
    }
};
