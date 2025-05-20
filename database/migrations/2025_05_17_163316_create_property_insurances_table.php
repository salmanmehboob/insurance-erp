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
        Schema::create('property_insurances', function (Blueprint $table) {
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
            $table->text('property_description')->nullable();

            $table->string('property_causes_loss', 100)->nullable();
            $table->string('property_deductible', 100)->nullable();
            $table->string('property_building', 100)->nullable();
            $table->string('property_contents', 100)->nullable();
            $table->string('property_basic', 100)->nullable();
            $table->string('property_broad', 100)->nullable();
            $table->string('property_special', 100)->nullable();
            $table->string('property_earthquake', 100)->nullable();
            $table->string('property_wind', 100)->nullable();
            $table->string('property_flood', 100)->nullable();
            $table->string('property_other_one', 100)->nullable();
            $table->string('property_other_two', 100)->nullable();
            $table->string('property_policy_number', 100)->nullable();
            $table->string('property_effective_date', 100)->nullable();
            $table->string('property_expiration_date', 100)->nullable();

            $table->string('property_coverage_building', 100)->nullable();
            $table->string('property_coverage_building_limit', 100)->nullable();
            $table->string('property_coverage_personal', 100)->nullable();
            $table->string('property_coverage_personal_limit', 100)->nullable();
            $table->string('property_coverage_income', 100)->nullable();
            $table->string('property_coverage_income_limit', 100)->nullable();
            $table->string('property_coverage_expense', 100)->nullable();
            $table->string('property_coverage_expense_limit', 100)->nullable();
            $table->string('property_coverage_rental', 100)->nullable();
            $table->string('property_coverage_rental_limit', 100)->nullable();
            $table->string('property_coverage_b_building', 100)->nullable();
            $table->string('property_coverage_b_building_limit', 100)->nullable();
            $table->string('property_coverage_b_prop', 100)->nullable();
            $table->string('property_coverage_b_prop_limit', 100)->nullable();
            $table->string('property_coverage_b_pp', 100)->nullable();
            $table->string('property_coverage_b_pp_limit', 100)->nullable();
            $table->string('property_coverage_other_one', 100)->nullable();
            $table->string('property_coverage_other_one_limit', 100)->nullable();
            $table->string('property_coverage_other_two', 100)->nullable();
            $table->string('property_coverage_other_two_limit', 100)->nullable();

            $table->string('inland_causes', 100)->nullable();
            $table->string('inland_perils', 100)->nullable();
            $table->string('inland_other', 100)->nullable();
            $table->string('inland_policy_type', 100)->nullable();
            $table->string('inland_policy_number', 100)->nullable();
            $table->string('inland_policy_effective_date', 100)->nullable();
            $table->string('inland_policy_expiration_date', 100)->nullable();

            $table->string('inland_coverage_one', 100)->nullable();
            $table->string('inland_coverage_one_limit', 100)->nullable();
            $table->string('inland_coverage_two', 100)->nullable();
            $table->string('inland_coverage_two_limit', 100)->nullable();
            $table->string('inland_coverage_three', 100)->nullable();
            $table->string('inland_coverage_three_limit', 100)->nullable();
            $table->string('inland_coverage_four', 100)->nullable();
            $table->string('inland_coverage_four_limit', 100)->nullable();

            $table->string('crime_policy_type', 100)->nullable();
            $table->string('crime_policy_number', 100)->nullable();
            $table->string('crime_effective_date', 100)->nullable();
            $table->string('crime_expiration_date', 100)->nullable();

            $table->string('crime_coverage_one', 100)->nullable();
            $table->string('crime_coverage_one_limit', 100)->nullable();
            $table->string('crime_coverage_two', 100)->nullable();
            $table->string('crime_coverage_two_limit', 100)->nullable();
            $table->string('crime_coverage_three', 100)->nullable();
            $table->string('crime_coverage_three_limit', 100)->nullable();

            $table->string('machinery_policy_number', 100)->nullable();
            $table->string('machinery_effective_date', 100)->nullable();
            $table->string('machinery_expiration_date', 100)->nullable();

            $table->string('machinery_coverage_one', 100)->nullable();
            $table->string('machinery_coverage_one_limit', 100)->nullable();
            $table->string('machinery_coverage_two', 100)->nullable();
            $table->string('machinery_coverage_two_limit', 100)->nullable();

            $table->string('other_type', 100)->nullable();
            $table->string('other_policy_number', 100)->nullable();
            $table->string('other_effective_date', 100)->nullable();
            $table->string('other_expiration_date', 100)->nullable();

            $table->string('other_coverage_one', 100)->nullable();
            $table->string('other_coverage_one_limit', 100)->nullable();
            $table->string('other_coverage_two', 100)->nullable();
            $table->string('other_coverage_two_limit', 100)->nullable();

            $table->text('special_condition')->nullable();
            $table->text('certificate_holder')->nullable();
            $table->string('authorize_representative',100)->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_insurances');
    }
};
