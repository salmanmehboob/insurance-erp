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
        Schema::create('insurance_application_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('insurance_applications')->onDelete('cascade');

            $table->tinyInteger('attachment_account_receivable')->nullable();
            $table->tinyInteger('attachment_additional_interest')->nullable();
            $table->tinyInteger('attachment_additional_premises')->nullable();
            $table->tinyInteger('attachment_apartment')->nullable();
            $table->tinyInteger('attachment_condo')->nullable();
            $table->tinyInteger('attachment_contractor')->nullable();
            $table->tinyInteger('attachment_coverage')->nullable();
            $table->tinyInteger('attachment_dealer')->nullable();
            $table->tinyInteger('attachment_driver')->nullable();
            $table->tinyInteger('attachment_electronic')->nullable();
            $table->tinyInteger('attachment_glass')->nullable();
            $table->tinyInteger('attachment_hotel')->nullable();
            $table->tinyInteger('attachment_installation')->nullable();
            $table->tinyInteger('attachment_liability_exposure')->nullable();
            $table->tinyInteger('attachment_property_exposure')->nullable();
            $table->tinyInteger('attachment_loss')->nullable();
            $table->tinyInteger('attachment_cargo')->nullable();
            $table->tinyInteger('attachment_premium')->nullable();
            $table->tinyInteger('attachment_professional')->nullable();
            $table->tinyInteger('attachment_restaurant')->nullable();
            $table->tinyInteger('attachment_statement')->nullable();
            $table->tinyInteger('attachment_state')->nullable();
            $table->tinyInteger('attachment_vacant')->nullable();
            $table->tinyInteger('attachment_vehicle')->nullable();
            $table->string('attachment_other_one', 50)->nullable();
            $table->string('attachment_other_two', 50)->nullable();
            $table->string('attachment_other_three', 50)->nullable();
            $table->string('attachment_other_four', 50)->nullable();
            $table->string('attachment_other_five', 50)->nullable();
            $table->string('attachment_other_six', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_application_attachments');
    }
};
