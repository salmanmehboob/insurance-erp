<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralLiability extends Model
{
    use  HasFactory;
    protected $guarded = [];

    protected $table = 'general_liability';
    protected $fillable = [
        'client_id',

        'invoice_date',
        'agency_name',
        'carrier',
        'naic_code',
        'policy_number',
        'effective_date',
        'expiration_date',
        'insured_name',

        'coverage_general',
        'coverage_claim',
        'coverage_occurrence',
        'coverage_occurrence_protective',
        'coverage_occurrence_other',

        'coverage_general_limit',
        'coverage_general_policy',
        'coverage_general_location',
        'coverage_general_project',
        'coverage_general_other',
        'coverage_product_aggregate_limit',

        'coverage_premium',
        'coverage_premium_product',
        'coverage_premium_other',
        'coverage_premium_total',


        'deductible_property_damage',
        'deductible_property_damage_cost',
        'deductible_body_injury',
        'deductible_body_injury_cost',
        'deductible_other',
        'deductible_other_cost',
        'deductible_per_claim',
        'deductible_per_occurrence',

        'deductible_personal_injury',
        'deductible_each_occurrence',
        'deductible_damage_rented',
        'deductible_expense',
        'deductible_benefits',
        'deductible_other_benefits',

        'other_coverage',

        'um_coverage',
        'medical_coverage',

        'loc_one',
        'haze_one',
        'class_code_one',
        'premium_basis_one',
        'exposure_one',
        'terr_one',
        'ops_rate_one',
        'product_rate_one',
        'ops_premium_one',
        'product_premium_one',
        'classification_one',

        'loc_two',
        'haze_two',
        'class_code_two',
        'premium_basis_two',
        'exposure_two',
        'terr_two',
        'ops_rate_two',
        'product_rate_two',
        'ops_premium_two',
        'product_premium_two',
        'classification_two',

        'loc_three',
        'haze_three',
        'class_code_three',
        'premium_basis_three',
        'exposure_three',
        'terr_three',
        'ops_rate_three',
        'product_rate_three',
        'ops_premium_three',
        'product_premium_three',
        'classification_three',


        'claim_made',
        'claim_made_proposed_date',
        'claim_made_entry_date',
        'claim_made_previous_coverage',
        'claim_made_previous_policy',

        'employee_deductible',
        'employee_number',
        'employee_covered',
        'employee_retroactive_date',

        'agency_customer_id',

        'contractor_draw',
        'contractor_draw_detail',

        'contractor_operation_material',
        'contractor_operation_material_detail',

        'contractor_operation_moving',
        'contractor_operation_moving_detail',

        'contractor_sub_contractor',
        'contractor_sub_contractor_detail',

        'contractor_sub_contractor_insurance',
        'contractor_sub_contractor_insurance_detail',

        'contractor_lease_equipment',
        'contractor_lease_equipment_detail',

        'sub_contractor_type',
        'sub_contractor_paid',
        'sub_contractor_percentage',
        'sub_contractor_full_time',
        'sub_contractor_part_time',


        'product_one',
        'product_salary_one',
        'product_unit_one',
        'product_time_one',
        'product_life_one',
        'product_insured_one',
        'product_component_one',


        'product_two',
        'product_salary_two',
        'product_unit_two',
        'product_time_two',
        'product_life_two',
        'product_insured_two',
        'product_component_two',


        'product_three',
        'product_salary_three',
        'product_unit_three',
        'product_time_three',
        'product_life_three',
        'product_insured_three',
        'product_component_three',

        'product_install',
        'product_install_detail',

        'product_sold',
        'product_sold_detail',

        'product_research',
        'product_research_detail',

        'product_warranty',
        'product_warranty_detail',

        'product_aircraft',
        'product_aircraft_detail',

        'product_recall',
        'product_recall_detail',

        'product_other_sold',
        'product_other_sold_detail',

        'product_label',
        'product_label_detail',

        'product_vendor',
        'product_vendor_detail',

        'product_insured',
        'product_insured_detail',


        'interest_additional',
        'interest_employee',
        'interest_lender',
        'interest_holder',
        'interest_loss',
        'interest_mortgage',
        'interest_other',

        'interest_type',
        'interest_name',
        'interest_address',
        'interest_rank',
        'interest_reference',

        'interest_location',
        'interest_building',
        'interest_item_class',
        'interest_item',
        'interest_item_description',

        'information_q_one',
        'information_q_two',
        'information_q_three',
        'information_q_four',
        'information_q_five',
        'information_equipment_one',
        'information_equipment_type_one',
        'information_equipment_instruction_one',
        'information_equipment_two',
        'information_equipment_type_two',
        'information_equipment_instruction_two',
        'information_q_six',
        'information_q_seven',
        'information_q_eight',
        'information_q_nine',
        'information_q_ten',
        'information_q_apt',
        'information_q_apt_area',
        'information_q_apt_description',
        'information_q_eleven',
        'information_approved_fence',
        'information_limited_access',
        'information_diving_board',
        'information_slide',
        'information_above_ground',
        'information_in_ground',
        'information_lift_guard',
        'information_q_twelve',
        'information_q_thirteen',
        'information_sport_type',
        'information_sport_contact',
        'information_sport_age',
        'information_sport_sponsorship',
        'information_fourteen',
        'information_fifteen',
        'information_sixteen',
        'information_seventeen',

        'information_lease_to_one',
        'information_lease_to_one_coverage',
        'information_lease_to_two',
        'information_lease_to_two_coverage',

        'information_lease_from_one',
        'information_lease_from_one_coverage',
        'information_lease_from_two',
        'information_lease_from_two_coverage',

        'information_eighteen',
        'information_nineteen',
        'information_twenty',
        'information_twenty_one',
        'information_twenty_two',

        'remarks',
        'procedure_signature',
            'procedure_name',
        'procedure_license',
        'applicant_signature',
        'applicant_date',
        'procedure_no',


        'created_by',
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
