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
        Schema::create('insurance_application_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('insurance_applications')->onDelete('cascade');

            $table->string('policy_effective_date', 50)->nullable();
            $table->string('policy_expiration_date', 50)->nullable();
            $table->string('policy_billing_plan', 50)->nullable();
            $table->string('policy_payment_plan', 50)->nullable();
            $table->string('policy_payment_method', 50)->nullable();
            $table->string('policy_audit', 50)->nullable();
            $table->string('policy_deposit', 50)->nullable();
            $table->string('policy_minimum_premium', 50)->nullable();
            $table->string('policy_policy_premium', 50)->nullable();

            $table->string('applicant_one_name', 50)->nullable();
            $table->string('applicant_one_address', 50)->nullable();
            $table->string('applicant_one_city', 50)->nullable();
            $table->string('applicant_one_state', 50)->nullable();
            $table->string('applicant_one_zipcode', 50)->nullable();
            $table->string('applicant_one_gl_code', 50)->nullable();
            $table->string('applicant_one_sic_code', 50)->nullable();
            $table->string('applicant_one_naic_code', 50)->nullable();
            $table->string('applicant_one_soc_code', 50)->nullable();
            $table->string('applicant_one_phone', 50)->nullable();
            $table->string('applicant_one_website', 50)->nullable();
            $table->tinyInteger('applicant_one_corporation')->nullable();
            $table->tinyInteger('applicant_one_individual')->nullable();
            $table->tinyInteger('applicant_one_joint_adventure')->nullable();
            $table->tinyInteger('applicant_one_llc')->nullable();
            $table->string('applicant_one_members', 50)->nullable();
            $table->tinyInteger('applicant_one_non_profit')->nullable();
            $table->tinyInteger('applicant_one_partnership')->nullable();
            $table->tinyInteger('applicant_one_sub_chapter')->nullable();
            $table->tinyInteger('applicant_one_trust')->nullable();
            $table->tinyInteger('applicant_one_other')->nullable();

            $table->string('applicant_two_name', 50)->nullable();
            $table->string('applicant_two_address', 50)->nullable();
            $table->string('applicant_two_city', 50)->nullable();
            $table->string('applicant_two_state', 50)->nullable();
            $table->string('applicant_two_zipcode', 50)->nullable();
            $table->string('applicant_two_gl_code', 50)->nullable();
            $table->string('applicant_two_sic_code', 50)->nullable();
            $table->string('applicant_two_naic_code', 50)->nullable();
            $table->string('applicant_two_soc_code', 50)->nullable();
            $table->string('applicant_two_phone', 50)->nullable();
            $table->string('applicant_two_website', 50)->nullable();
//            $table->string('applicant_two_corporation', 50)->nullable();
            $table->tinyInteger('applicant_two_corporation')->nullable();
            $table->tinyInteger('applicant_two_individual')->nullable();
            $table->tinyInteger('applicant_two_joint_adventure')->nullable();
            $table->tinyInteger('applicant_two_llc')->nullable();
            $table->string('applicant_two_members', 50)->nullable();
            $table->tinyInteger('applicant_two_non_profit')->nullable();
            $table->tinyInteger('applicant_two_partnership')->nullable();
            $table->tinyInteger('applicant_two_sub_chapter')->nullable();
            $table->tinyInteger('applicant_two_trust')->nullable();
            $table->tinyInteger('applicant_two_other')->nullable();

            $table->string('applicant_three_name', 50)->nullable();
            $table->string('applicant_three_address', 50)->nullable();
            $table->string('applicant_three_city', 50)->nullable();
            $table->string('applicant_three_state', 50)->nullable();
            $table->string('applicant_three_zipcode', 50)->nullable();
            $table->string('applicant_three_gl_code', 50)->nullable();
            $table->string('applicant_three_sic_code', 50)->nullable();
            $table->string('applicant_three_naic_code', 50)->nullable();
            $table->string('applicant_three_soc_code', 50)->nullable();
            $table->string('applicant_three_phone', 50)->nullable();
            $table->string('applicant_three_website', 50)->nullable();
//            $table->string('applicant_three_corporation', 50)->nullable();
            $table->tinyInteger('applicant_three_corporation')->nullable();
            $table->tinyInteger('applicant_three_individual')->nullable();
            $table->tinyInteger('applicant_three_joint_adventure')->nullable();
            $table->tinyInteger('applicant_three_llc')->nullable();
            $table->string('applicant_three_members', 50)->nullable();
            $table->tinyInteger('applicant_three_non_profit')->nullable();
            $table->tinyInteger('applicant_three_partnership')->nullable();
            $table->tinyInteger('applicant_three_sub_chapter')->nullable();
            $table->tinyInteger('applicant_three_trust')->nullable();
            $table->tinyInteger('applicant_three_other')->nullable();


            $table->string('contact_info_type_one', 50)->nullable();
            $table->string('contact_info_name_one', 50)->nullable();
            $table->string('contact_info_pp_type_one', 50)->nullable();
            $table->string('contact_info_pp_number_one', 50)->nullable();
            $table->string('contact_info_sp_type_one', 50)->nullable();
            $table->string('contact_info_sp_number_one', 50)->nullable();
            $table->string('contact_info_s_email_one', 50)->nullable();
            $table->string('contact_info_p_email_one', 50)->nullable();

            $table->string('contact_info_type_two', 50)->nullable();
            $table->string('contact_info_name_two', 50)->nullable();
            $table->string('contact_info_pp_type_two', 50)->nullable();
            $table->string('contact_info_pp_number_two', 50)->nullable();
            $table->string('contact_info_sp_type_two', 50)->nullable();
            $table->string('contact_info_sp_number_two', 50)->nullable();
            $table->string('contact_info_s_email_two', 50)->nullable();
            $table->string('contact_info_p_email_two', 50)->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_application_applicants');
    }
};
