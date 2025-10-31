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
        Schema::create('dwelling_general_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('q1_s1_bus')->nullable();
            $table->text('q1_s1_policy')->nullable();
            $table->text('q1_s2_bus')->nullable();
            $table->text('q1_s2_policy')->nullable();
            $table->text('q2')->nullable();
            $table->text('q3')->nullable();
            $table->text('q4')->nullable();
            $table->text('q5')->nullable();
            $table->text('q6')->nullable();
            $table->text('q7')->nullable();
            $table->text('agencyID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_general_info');
    }
};
