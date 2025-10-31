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
        Schema::create('dwelling_remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('remarks_check_earth')->nullable();
            $table->text('remarks_check_pers')->nullable();
            $table->text('remarks_check_residence')->nullable();
            $table->text('remarks_check_windstrom')->nullable();
            $table->text('remarks_check_flood')->nullable();
            $table->text('remarks_check_photograph')->nullable();
            $table->text('remarks_check_solid')->nullable();
            $table->text('remarks_check_other1')->nullable();
            $table->text('remarks_check_other')->nullable();
            $table->text('remarks_check_lead')->nullable();
            $table->text('remarks_check_protection')->nullable();
            $table->text('remarks_check_state')->nullable();
            $table->text('remarks_checkother')->nullable();
            $table->text('remarks_check_other2')->nullable();
            $table->text('remarks_check_personal')->nullable();
            $table->text('remarks_check_replacement')->nullable();
            $table->text('remarks_check_water')->nullable();
            $table->text('remarks_check3_other')->nullable();
            $table->text('remarks_check_other3')->nullable();
            $table->text('remarks')->nullable();
            $table->text('agencyID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_remarks');
    }
};
