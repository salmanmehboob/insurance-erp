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
        Schema::create('insurance_application_prior', function (Blueprint $table) {
            $table->id();

            $table->foreignId('application_id')->constrained('insurance_applications')->onDelete('cascade');


            $table->string('carrier_one_year', 50)->nullable();

            $table->string('carrier_one_gl', 50)->nullable();
            $table->string('carrier_one_auto', 50)->nullable();
            $table->string('carrier_one_property', 50)->nullable();
            $table->string('carrier_one_other', 50)->nullable();

            $table->string('carrier_policy_one_gl', 50)->nullable();
            $table->string('carrier_policy_one_auto', 50)->nullable();
            $table->string('carrier_policy_one_property', 50)->nullable();
            $table->string('carrier_policy_one_other', 50)->nullable();

            $table->string('carrier_premium_one_gl', 50)->nullable();
            $table->string('carrier_premium_one_auto', 50)->nullable();
            $table->string('carrier_premium_one_property', 50)->nullable();
            $table->string('carrier_premium_one_other', 50)->nullable();

            $table->string('carrier_effective_one_gl', 50)->nullable();
            $table->string('carrier_effective_one_auto', 50)->nullable();
            $table->string('carrier_effective_one_property', 50)->nullable();
            $table->string('carrier_effective_one_other', 50)->nullable();

            $table->string('carrier_expiration_one_gl', 50)->nullable();
            $table->string('carrier_expiration_one_auto', 50)->nullable();
            $table->string('carrier_expiration_one_property', 50)->nullable();
            $table->string('carrier_expiration_one_other', 50)->nullable();


            $table->string('carrier_two_year', 50)->nullable();

            $table->string('carrier_two_gl', 50)->nullable();
            $table->string('carrier_two_auto', 50)->nullable();
            $table->string('carrier_two_property', 50)->nullable();
            $table->string('carrier_two_other', 50)->nullable();

            $table->string('carrier_policy_two_gl', 50)->nullable();
            $table->string('carrier_policy_two_auto', 50)->nullable();
            $table->string('carrier_policy_two_property', 50)->nullable();
            $table->string('carrier_policy_two_other', 50)->nullable();

            $table->string('carrier_premium_two_gl', 50)->nullable();
            $table->string('carrier_premium_two_auto', 50)->nullable();
            $table->string('carrier_premium_two_property', 50)->nullable();
            $table->string('carrier_premium_two_other', 50)->nullable();

            $table->string('carrier_effective_two_gl', 50)->nullable();
            $table->string('carrier_effective_two_auto', 50)->nullable();
            $table->string('carrier_effective_two_property', 50)->nullable();
            $table->string('carrier_effective_two_other', 50)->nullable();

            $table->string('carrier_expiration_two_gl', 50)->nullable();
            $table->string('carrier_expiration_two_auto', 50)->nullable();
            $table->string('carrier_expiration_two_property', 50)->nullable();
            $table->string('carrier_expiration_two_other', 50)->nullable();

            $table->string('carrier_three_year', 50)->nullable();

            $table->string('carrier_three_gl', 50)->nullable();
            $table->string('carrier_three_auto', 50)->nullable();
            $table->string('carrier_three_property', 50)->nullable();
            $table->string('carrier_three_other', 50)->nullable();

            $table->string('carrier_policy_three_gl', 50)->nullable();
            $table->string('carrier_policy_three_auto', 50)->nullable();
            $table->string('carrier_policy_three_property', 50)->nullable();
            $table->string('carrier_policy_three_other', 50)->nullable();

            $table->string('carrier_premium_three_gl', 50)->nullable();
            $table->string('carrier_premium_three_auto', 50)->nullable();
            $table->string('carrier_premium_three_property', 50)->nullable();
            $table->string('carrier_premium_three_other', 50)->nullable();

            $table->string('carrier_effective_three_gl', 50)->nullable();
            $table->string('carrier_effective_three_auto', 50)->nullable();
            $table->string('carrier_effective_three_property', 50)->nullable();
            $table->string('carrier_effective_three_other', 50)->nullable();

            $table->string('carrier_expiration_three_gl', 50)->nullable();
            $table->string('carrier_expiration_three_auto', 50)->nullable();
            $table->string('carrier_expiration_three_property', 50)->nullable();
            $table->string('carrier_expiration_three_other', 50)->nullable();

            $table->string('loss_year', 50)->nullable();
            $table->string('loss_amount', 50)->nullable();

            $table->string('loss_one_date', 50)->nullable();
            $table->string('loss_one_line', 50)->nullable();
            $table->text('loss_one_description')->nullable();
            $table->string('loss_one_claim_date', 50)->nullable();
            $table->string('loss_one_amount_paid', 50)->nullable();
            $table->string('loss_one_amount_reserved', 50)->nullable();
            $table->string('loss_one_subrogation')->nullable();
            $table->string('loss_one_claim_open')->nullable();

            $table->string('loss_two_date', 50)->nullable();
            $table->string('loss_two_line', 50)->nullable();
            $table->text('loss_two_description')->nullable();
            $table->string('loss_two_claim_date', 50)->nullable();
            $table->string('loss_two_amount_paid', 50)->nullable();
            $table->string('loss_two_amount_reserved', 50)->nullable();
            $table->string('loss_two_subrogation')->nullable();
            $table->string('loss_two_claim_open')->nullable();

            $table->string('loss_three_date', 50)->nullable();
            $table->string('loss_three_line', 50)->nullable();
            $table->text('loss_three_description')->nullable();
            $table->string('loss_three_claim_date', 50)->nullable();
            $table->string('loss_three_amount_paid', 50)->nullable();
            $table->string('loss_three_amount_reserved', 50)->nullable();
            $table->string('loss_three_subrogation')->nullable();
            $table->string('loss_three_claim_open')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_application_prior');
    }
};
