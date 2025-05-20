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
        Schema::create('liabilty_insurances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->string('invoice_date', 50)->nullable();
            $table->string('producer_name', 100)->nullable();
            $table->string('producer_phone', 100)->nullable();
            $table->string('producer_fax', 100)->nullable();
            $table->string('producer_address', 100)->nullable();
            $table->string('producer_city', 100)->nullable();
            $table->string('producer_state', 100)->nullable();
            $table->string('producer_zipcode', 100)->nullable();

            $table->string('contact_name', 100)->nullable();
            $table->string('contact_phone_no', 100)->nullable();
            $table->string('contact_fax_no', 100)->nullable();
            $table->string('contact_email', 100)->nullable();
            $table->string('producer_customer_id', 100)->nullable();

            $table->string('insured_name', 100)->nullable();
            $table->string('insured_phone', 100)->nullable();
            $table->string('insured_fax', 100)->nullable();
            $table->string('insured_address', 100)->nullable();
            $table->string('insured_city', 100)->nullable();
            $table->string('insured_state', 100)->nullable();
            $table->string('insured_zipcode', 100)->nullable();

            $table->string('insurer_a', 100)->nullable();
            $table->string('insurer_a_naic', 100)->nullable();

            $table->string('insurer_b', 100)->nullable();
            $table->string('insurer_b_naic', 100)->nullable();

            $table->string('insurer_c', 100)->nullable();
            $table->string('insurer_c_naic', 100)->nullable();

            $table->string('insurer_d', 100)->nullable();
            $table->string('insurer_d_naic', 100)->nullable();

            $table->string('insurer_e', 100)->nullable();
            $table->string('insurer_e_naic', 100)->nullable();

            $table->string('insurer_f', 100)->nullable();
            $table->string('insurer_f_naic', 100)->nullable();


            $table->string('coverages', 100)->nullable();
            $table->string('certificate_no', 100)->nullable();
            $table->string('revision_no', 100)->nullable();


            $table->string('commercial_claim', 100)->nullable();
            $table->string('commercial_occur', 100)->nullable();
            $table->string('commercial_other_one', 100)->nullable();
            $table->string('commercial_other_two', 100)->nullable();

            $table->string('commercial_aggregate_policy', 100)->nullable();
            $table->string('commercial_aggregate_project', 100)->nullable();
            $table->string('commercial_aggregate_loc', 100)->nullable();
            $table->string('commercial_aggregate_other', 100)->nullable();

            $table->string('commercial_addl', 100)->nullable();
            $table->string('commercial_subr', 100)->nullable();
            $table->string('commercial_policy_number', 100)->nullable();
            $table->string('commercial_effective_date', 100)->nullable();
            $table->string('commercial_expiration_date', 100)->nullable();

            $table->string('commercial_each_occurrence', 100)->nullable();
            $table->string('commercial_damage', 100)->nullable();
            $table->string('commercial_expense', 100)->nullable();
            $table->string('commercial_injury', 100)->nullable();
            $table->string('commercial_general_aggregate', 100)->nullable();
            $table->string('commercial_general_product', 100)->nullable();
            $table->string('commercial_general_other', 100)->nullable();

            $table->string('commercial_each_occurrence_limit', 100)->nullable();
            $table->string('commercial_damage_limit', 100)->nullable();
            $table->string('commercial_expense_limit', 100)->nullable();
            $table->string('commercial_injury_limit', 100)->nullable();
            $table->string('commercial_general_aggregate_limit', 100)->nullable();
            $table->string('commercial_general_product_limit', 100)->nullable();
            $table->string('commercial_general_other_limit', 100)->nullable();

            $table->string('automobile_any', 100)->nullable();
            $table->string('automobile_own', 100)->nullable();
            $table->string('automobile_schedule', 100)->nullable();
            $table->string('automobile_hired', 100)->nullable();
            $table->string('automobile_non_own', 100)->nullable();
            $table->string('automobile_other_one', 100)->nullable();
            $table->string('automobile_other_two', 100)->nullable();

            $table->string('automobile_addl', 100)->nullable();
            $table->string('automobile_subr', 100)->nullable();
            $table->string('automobile_policy_number', 100)->nullable();
            $table->string('automobile_effective_date', 100)->nullable();
            $table->string('automobile_expiration_date', 100)->nullable();

            $table->string('automobile_combine', 100)->nullable();
            $table->string('automobile_injury_person', 100)->nullable();
            $table->string('automobile_injury_accident', 100)->nullable();
            $table->string('automobile_property_damage', 100)->nullable();
            $table->string('automobile_other', 100)->nullable();

            $table->string('automobile_combine_limit', 100)->nullable();
            $table->string('automobile_injury_person_limit', 100)->nullable();
            $table->string('automobile_injury_accident_limit', 100)->nullable();
            $table->string('automobile_property_damage_limit', 100)->nullable();
            $table->string('automobile_other_limit', 100)->nullable();

            $table->string('umbrella', 100)->nullable();
            $table->string('umbrella_occur', 100)->nullable();
            $table->string('umbrella_claim', 100)->nullable();
            $table->string('umbrella_excess', 100)->nullable();
            $table->string('umbrella_ded', 100)->nullable();
            $table->string('umbrella_retention', 100)->nullable();

            $table->string('umbrella_addl', 100)->nullable();
            $table->string('umbrella_subr', 100)->nullable();
            $table->string('umbrella_policy_number', 100)->nullable();
            $table->string('umbrella_effective_date', 100)->nullable();
            $table->string('umbrella_expiration_date', 100)->nullable();

            $table->string('umbrella_each_occurrence', 100)->nullable();
            $table->string('umbrella_aggregate', 100)->nullable();
            $table->string('umbrella_aggregate_other', 100)->nullable();
            $table->string('umbrella_each_occurrence_limit', 100)->nullable();
            $table->string('umbrella_aggregate_limit', 100)->nullable();
            $table->string('umbrella_aggregate_other_limit', 100)->nullable();

            $table->string('compensation', 100)->nullable();
            $table->string('compensation_addl', 100)->nullable();
            $table->string('compensation_subr', 100)->nullable();
            $table->string('compensation_policy_number', 100)->nullable();
            $table->string('compensation_effective_date', 100)->nullable();
            $table->string('compensation_expiration_date', 100)->nullable();

            $table->string('compensation_per_stat', 100)->nullable();
            $table->string('compensation_other', 100)->nullable();
            $table->string('compensation_each_accident', 100)->nullable();
            $table->string('compensation_disease_employee', 100)->nullable();
            $table->string('compensation_disease_policy', 100)->nullable();

            $table->string('compensation_per_stat_limit', 100)->nullable();
            $table->string('compensation_each_accident_limit', 100)->nullable();
            $table->string('compensation_disease_employee_limit', 100)->nullable();
            $table->string('compensation_disease_policy_limit', 100)->nullable();

            $table->text('special_condition')->nullable();
            $table->text('certificate_holder')->nullable();
            $table->string('authorize_representative', 100)->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liabilty_insurances');
    }
};
