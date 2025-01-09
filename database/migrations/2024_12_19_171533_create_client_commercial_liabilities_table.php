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
            $table->text('general_liability');

            $table->string('general_aggregate');
            $table->string('product_aggregate');
            $table->string('personal_injury');
            $table->string('each_occurrence');
            $table->string('fire_damage');
            $table->string('medical_expense');
            $table->string('annual_receipt');

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
