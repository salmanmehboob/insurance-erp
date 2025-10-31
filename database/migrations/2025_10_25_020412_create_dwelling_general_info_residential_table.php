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
        Schema::create('dwelling_general_info_residential', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('gn_q1_farming')->nullable();
            $table->text('gn_q1_telecom')->nullable();
            $table->text('gn_q1_dayCare')->nullable();
            $table->text('gn_q1_home')->nullable();
            $table->text('gn_q2')->nullable();
            $table->text('gn_q3_s1_animal')->nullable();
            $table->text('gn_q3_s1_breed')->nullable();
            $table->text('gn_q3_s1_bite')->nullable();
            $table->text('gn_q3_s2_animal')->nullable();
            $table->text('gn_q3_s2_breed')->nullable();
            $table->text('gn_q3_s2_bite')->nullable();
            $table->text('gn_q4')->nullable();
            $table->text('gn_q5')->nullable();
            $table->text('gn_q6')->nullable();
            $table->text('gn_q8')->nullable();
            $table->text('gn_q8a')->nullable();
            $table->text('gn_q9')->nullable();
            $table->text('gn_q10')->nullable();
            $table->text('gn_q11a')->nullable();
            $table->text('gn_q11b')->nullable();
            $table->text('gn_q11c')->nullable();
            $table->text('gn_q12')->nullable();
            $table->text('gn_q13_start')->nullable();
            $table->text('gn_q13_comp')->nullable();
            $table->text('gn_q13_int')->nullable();
            $table->text('gn_q13_ext')->nullable();
            $table->text('gn_q13_addition')->nullable();
            $table->text('gn_q13_level')->nullable();
            $table->text('qn_q13_y')->nullable();
            $table->text('qn_q13_inc')->nullable();
            $table->text('qn_q13_excl')->nullable();
            $table->text('qn_q13_N')->nullable();
            $table->text('qn_q13_cost')->nullable();
            $table->text('gn_q14')->nullable();
            $table->text('gn_q15')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_general_info_residential');
    }
};
