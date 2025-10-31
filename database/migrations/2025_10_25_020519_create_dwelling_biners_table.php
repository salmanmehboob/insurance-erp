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
        Schema::create('dwelling_biners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dwelling_fire_id')->constrained('dwelling_fire_application')->onDelete('cascade');
            $table->text('binders_effective')->nullable();
            $table->text('binders_expire')->nullable();
            $table->text('binders_time')->nullable();
            $table->text('binders_noon')->nullable();
            $table->text('binders_coverage')->nullable();
            $table->text('applicantInitials')->nullable();
            $table->text('tems')->nullable();
            $table->text('producerSignature')->nullable();
            $table->text('producerName')->nullable();
            $table->text('stateLicense')->nullable();
            $table->text('applicantSignature')->nullable();
            $table->text('dateApplication')->nullable();
            $table->text('nationalProducer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dwelling_biners');
    }
};
