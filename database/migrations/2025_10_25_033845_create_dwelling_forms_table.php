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
        Schema::create('dwelling_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('formAndor_r1_loc')->nullable();
            $table->text('formAndor_r1_formNum')->nullable();
            $table->text('formAndor_r1_formName')->nullable();
            $table->text('formAndor_r1_editionDate')->nullable();
            $table->text('formAndor_r1_copyright')->nullable();
            $table->text('formAndor_r2_loc')->nullable();
            $table->text('formAndor_r2_formNum')->nullable();
            $table->text('formAndor_r2_formName')->nullable();
            $table->text('formAndor_r2_editionDate')->nullable();
            $table->text('formAndor_r2_copyright')->nullable();
            $table->text('formAndor_r3_loc')->nullable();
            $table->text('formAndor_r3_formNum')->nullable();
            $table->text('formAndor_r3_formName')->nullable();
            $table->text('formAndor_r3_editionDate')->nullable();
            $table->text('formAndor_r3_copyright')->nullable();
            $table->text('formAndor_r4_loc')->nullable();
            $table->text('formAndor_r4_formNum')->nullable();
            $table->text('formAndor_r4_formName')->nullable();
            $table->text('formAndor_r4_editionDate')->nullable();
            $table->text('formAndor_r4_copyright')->nullable();
            $table->text('formAndor_r5_loc')->nullable();
            $table->text('formAndor_r5_formNum')->nullable();
            $table->text('formAndor_r5_formName')->nullable();
            $table->text('formAndor_r5_editionDate')->nullable();
            $table->text('formAndor_r5_copyright')->nullable();
            $table->text('formAndor_r6_loc')->nullable();
            $table->text('formAndor_r6_formNum')->nullable();
            $table->text('formAndor_r6_formName')->nullable();
            $table->text('formAndor_r6_editionDate')->nullable();
            $table->text('formAndor_r6_copyright')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_forms');
    }
};
