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
        Schema::create('general_liability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->string('invoice_date', 50)->nullable();
            $table->string('agency_name', 50)->nullable();
            $table->string('carrier', 50)->nullable();
            $table->string('naic_code', 50)->nullable();
            $table->string('policy_number', 50)->nullable();
            $table->string('effective_date', 50)->nullable();
            $table->string('expiration_date', 50)->nullable();
            $table->string('insured_name', 50)->nullable();

            $table->string('coverage_general', 50)->nullable();
            $table->string('coverage_claim', 50)->nullable();
            $table->string('coverage_occurrence', 50)->nullable();
            $table->string('coverage_occurrence_protective', 50)->nullable();
            $table->string('coverage_occurrence_other', 50)->nullable();

            $table->string('coverage_general_limit', 50)->nullable();
            $table->string('coverage_general_policy', 50)->nullable();
            $table->string('coverage_general_location', 50)->nullable();
            $table->string('coverage_general_project', 50)->nullable();
            $table->string('coverage_general_other', 50)->nullable();
            $table->string('coverage_product_aggregate_limit', 50)->nullable();

            $table->string('coverage_premium', 50)->nullable();
            $table->string('coverage_premium_product', 50)->nullable();
            $table->string('coverage_premium_other', 50)->nullable();
            $table->string('coverage_premium_total', 50)->nullable();


            $table->string('deductible_property_damage', 50)->nullable();
            $table->string('deductible_property_damage_cost', 50)->nullable();
            $table->string('deductible_body_injury', 50)->nullable();
            $table->string('deductible_body_injury_cost', 50)->nullable();
            $table->string('deductible_other', 50)->nullable();
            $table->string('deductible_other_cost', 50)->nullable();
            $table->string('deductible_per_claim', 50)->nullable();
            $table->string('deductible_per_occurrence', 50)->nullable();

            $table->string('deductible_personal_injury', 50)->nullable();
            $table->string('deductible_each_occurrence', 50)->nullable();
            $table->string('deductible_damage_rented', 50)->nullable();
            $table->string('deductible_expense', 50)->nullable();
            $table->string('deductible_benefits', 50)->nullable();
            $table->string('deductible_other_benefits', 50)->nullable();

            $table->text('other_coverage')->nullable();

            $table->string('um_coverage', 50)->nullable();
            $table->string('medical_coverage', 50)->nullable();

            $table->string('loc_one', 50)->nullable();
            $table->string('haze_one', 50)->nullable();
            $table->string('class_code_one', 50)->nullable();
            $table->string('premium_basis_one', 50)->nullable();
            $table->string('exposure_one', 50)->nullable();
            $table->string('terr_one', 50)->nullable();
            $table->string('ops_rate_one', 50)->nullable();
            $table->string('product_rate_one', 50)->nullable();
            $table->string('ops_premium_one', 50)->nullable();
            $table->string('product_premium_one', 50)->nullable();
            $table->text('classification_one')->nullable();

            $table->string('loc_two', 50)->nullable();
            $table->string('haze_two', 50)->nullable();
            $table->string('class_code_two', 50)->nullable();
            $table->string('premium_basis_two', 50)->nullable();
            $table->string('exposure_two', 50)->nullable();
            $table->string('terr_two', 50)->nullable();
            $table->string('ops_rate_two', 50)->nullable();
            $table->string('product_rate_two', 50)->nullable();
            $table->string('ops_premium_two', 50)->nullable();
            $table->string('product_premium_two', 50)->nullable();
            $table->text('classification_two')->nullable();

            $table->string('loc_three', 50)->nullable();
            $table->string('haze_three', 50)->nullable();
            $table->string('class_code_three', 50)->nullable();
            $table->string('premium_basis_three', 50)->nullable();
            $table->string('exposure_three', 50)->nullable();
            $table->string('terr_three', 50)->nullable();
            $table->string('ops_rate_three', 50)->nullable();
            $table->string('product_rate_three', 50)->nullable();
            $table->string('ops_premium_three', 50)->nullable();
            $table->string('product_premium_three', 50)->nullable();
            $table->text('classification_three')->nullable();


            $table->string('claim_made', 50)->nullable();
            $table->string('claim_made_proposed_date', 50)->nullable();
            $table->string('claim_made_entry_date', 50)->nullable();
            $table->text('claim_made_previous_coverage')->nullable();
            $table->text('claim_made_previous_policy')->nullable();

            $table->string('employee_deductible', 50)->nullable();
            $table->string('employee_number', 50)->nullable();
            $table->string('employee_covered', 50)->nullable();
            $table->string('employee_retroactive_date', 50)->nullable();

            $table->string('agency_customer_id', 50)->nullable();

            $table->string('contractor_draw', 50)->nullable();
            $table->text('contractor_draw_detail')->nullable();

            $table->string('contractor_operation_material', 50)->nullable();
            $table->text('contractor_operation_material_detail')->nullable();

            $table->string('contractor_operation_moving', 50)->nullable();
            $table->text('contractor_operation_moving_detail')->nullable();

            $table->string('contractor_sub_contractor', 50)->nullable();
            $table->text('contractor_sub_contractor_detail')->nullable();

            $table->string('contractor_sub_contractor_insurance', 50)->nullable();
            $table->text('contractor_sub_contractor_insurance_detail')->nullable();

            $table->string('contractor_lease_equipment', 50)->nullable();
            $table->text('contractor_lease_equipment_detail')->nullable();

            $table->text('sub_contractor_type')->nullable();
            $table->string('sub_contractor_paid', 50)->nullable();
            $table->string('sub_contractor_percentage', 50)->nullable();
            $table->string('sub_contractor_full_time', 50)->nullable();
            $table->string('sub_contractor_part_time', 50)->nullable();


            $table->string('product_one', 50)->nullable();
            $table->string('product_salary_one', 50)->nullable();
            $table->string('product_unit_one', 50)->nullable();
            $table->string('product_time_one', 50)->nullable();
            $table->string('product_life_one', 50)->nullable();
            $table->string('product_insured_one', 50)->nullable();
            $table->string('product_component_one', 50)->nullable();


            $table->string('product_two', 50)->nullable();
            $table->string('product_salary_two', 50)->nullable();
            $table->string('product_unit_two', 50)->nullable();
            $table->string('product_time_two', 50)->nullable();
            $table->string('product_life_two', 50)->nullable();
            $table->string('product_insured_two', 50)->nullable();
            $table->string('product_component_two', 50)->nullable();


            $table->string('product_three', 50)->nullable();
            $table->string('product_salary_three', 50)->nullable();
            $table->string('product_unit_three', 50)->nullable();
            $table->string('product_time_three', 50)->nullable();
            $table->string('product_life_three', 50)->nullable();
            $table->string('product_insured_three', 50)->nullable();
            $table->string('product_component_three', 50)->nullable();

            $table->string('product_install', 50)->nullable();
            $table->text('product_install_detail')->nullable();

            $table->string('product_sold', 50)->nullable();
            $table->text('product_sold_detail')->nullable();

            $table->string('product_research', 50)->nullable();
            $table->text('product_research_detail')->nullable();

            $table->string('product_warranty', 50)->nullable();
            $table->text('product_warranty_detail')->nullable();

            $table->string('product_aircraft', 50)->nullable();
            $table->text('product_aircraft_detail')->nullable();

            $table->string('product_recall', 50)->nullable();
            $table->text('product_recall_detail')->nullable();

            $table->string('product_other_sold', 50)->nullable();
            $table->text('product_other_sold_detail')->nullable();

            $table->string('product_label', 50)->nullable();
            $table->text('product_label_detail')->nullable();

            $table->string('product_vendor', 50)->nullable();
            $table->text('product_vendor_detail')->nullable();

            $table->string('product_insured', 50)->nullable();
            $table->text('product_insured_detail')->nullable();


            $table->string('interest_additional', 50)->nullable();
            $table->string('interest_employee', 50)->nullable();
            $table->string('interest_lender', 50)->nullable();
            $table->string('interest_holder', 50)->nullable();
            $table->string('interest_loss', 50)->nullable();
            $table->string('interest_mortgage', 50)->nullable();
            $table->string('interest_other', 50)->nullable();

            $table->string('interest_type', 50)->nullable();
            $table->string('interest_name', 50)->nullable();
            $table->string('interest_address', 50)->nullable();
            $table->string('interest_rank', 50)->nullable();
            $table->string('interest_reference', 50)->nullable();

            $table->string('interest_location', 50)->nullable();
            $table->string('interest_building', 50)->nullable();
            $table->string('interest_item_class', 50)->nullable();
            $table->string('interest_item', 50)->nullable();
            $table->text('interest_item_description')->nullable();

            $table->string('information_q_one', 1)->nullable();
            $table->string('information_q_two', 1)->nullable();
            $table->string('information_q_three', 1)->nullable();
            $table->string('information_q_four', 1)->nullable();
            $table->string('information_q_five', 1)->nullable();

            $table->string('information_equipment_one', 50)->nullable();
            $table->string('information_equipment_type_one', 50)->nullable();
            $table->string('information_equipment_instruction_one', 50)->nullable();

            $table->string('information_equipment_two', 50)->nullable();
            $table->string('information_equipment_type_two', 50)->nullable();
            $table->string('information_equipment_instruction_two', 50)->nullable();

            $table->string('information_q_six', 1)->nullable();
            $table->string('information_q_seven', 1)->nullable();
            $table->string('information_q_eight', 1)->nullable();
            $table->string('information_q_nine', 1)->nullable();
            $table->string('information_q_ten', 1)->nullable();
            $table->string('information_q_apt', 5)->nullable();
            $table->string('information_q_apt_area', 5)->nullable();
            $table->text('information_q_apt_description')->nullable();
            $table->string('information_q_eleven', 1)->nullable();
            $table->string('information_approved_fence', 5)->nullable();
            $table->string('information_limited_access', 5)->nullable();
            $table->string('information_diving_board', 5)->nullable();
            $table->string('information_slide', 5)->nullable();
            $table->string('information_above_ground', 5)->nullable();
            $table->string('information_in_ground', 5)->nullable();
            $table->string('information_lift_guard', 5)->nullable();
            $table->string('information_q_twelve', 1)->nullable();
            $table->string('information_q_thirteen', 1)->nullable();
            $table->string('information_sport_type', 5)->nullable();
            $table->string('information_sport_contact', 5)->nullable();
            $table->string('information_sport_age', 5)->nullable();
            $table->string('information_sport_sponsorship', 5)->nullable();
            $table->string('information_fourteen', 1)->nullable();
            $table->string('information_fifteen', 1)->nullable();
            $table->string('information_sixteen', 1)->nullable();
            $table->string('information_seventeen', 1)->nullable();

            $table->string('information_lease_to_one', 50)->nullable();
            $table->string('information_lease_to_one_coverage', 50)->nullable();
            $table->string('information_lease_to_two', 50)->nullable();
            $table->string('information_lease_to_two_coverage', 50)->nullable();

            $table->string('information_lease_from_one', 50)->nullable();
            $table->string('information_lease_from_one_coverage', 50)->nullable();
            $table->string('information_lease_from_two', 50)->nullable();
            $table->string('information_lease_from_two_coverage', 50)->nullable();

            $table->string('information_eighteen', 1)->nullable();
            $table->string('information_nineteen', 1)->nullable();
            $table->string('information_twenty', 1)->nullable();
            $table->string('information_twenty_one', 1)->nullable();
            $table->string('information_twenty_two', 1)->nullable();

            $table->text('remarks')->nullable();
            $table->string('procedure_signature',50)->nullable();
            $table->string('procedure_name',50)->nullable();
            $table->string('procedure_license',50)->nullable();
            $table->string('applicant_signature',50)->nullable();
            $table->string('applicant_date',50)->nullable();
            $table->string('procedure_no',50)->nullable();

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_liability');
    }
};
