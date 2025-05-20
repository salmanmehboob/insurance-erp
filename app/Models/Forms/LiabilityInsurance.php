<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiabilityInsurance extends Model
{
    use  HasFactory;

    protected $table = 'liability_insurances';
    protected $fillable = [
        'client_id',

        'invoice_date',
        'producer_name',
        'producer_phone',
        'producer_fax',
        'producer_address',
        'producer_city',
        'producer_state',
        'producer_zipcode',

        'contact_name',
        'contact_phone_no',
        'contact_fax_no',
        'contact_email',
        'producer_customer_id',

        'insured_name',
        'insured_phone',
        'insured_fax',
        'insured_address',
        'insured_city',
        'insured_state',
        'insured_zipcode',

        'insurer_a',
        'insurer_a_naic',

        'insurer_b',
        'insurer_b_naic',

        'insurer_c',
        'insurer_c_naic',

        'insurer_d',
        'insurer_d_naic',

        'insurer_e',
        'insurer_e_naic',

        'insurer_f',
        'insurer_f_naic',


        'coverages',
        'certificate_no',
        'revision_no',
        'commercial_claim',
        'commercial_occur',
        'commercial_other_one',
        'commercial_other_two',

        'commercial_aggregate_policy',
        'commercial_aggregate_project',
        'commercial_aggregate_loc',
        'commercial_aggregate_other',

        'commercial_addl',
        'commercial_subr',
        'commercial_policy_number',
        'commercial_effective_date',
        'commercial_expiration_date',

        'commercial_each_occurrence',
        'commercial_damage',
        'commercial_expense',
        'commercial_injury',
        'commercial_general_aggregate',
        'commercial_general_product',
        'commercial_general_other',

        'commercial_each_occurrence_limit',
        'commercial_damage_limit',
        'commercial_expense_limit',
        'commercial_injury_limit',
        'commercial_general_aggregate_limit',
        'commercial_general_product_limit',
        'commercial_general_other_limit',

        'automobile_any',
        'automobile_own',
        'automobile_schedule',
        'automobile_hired',
        'automobile_non_own',
        'automobile_other_one',
        'automobile_other_two',

        'automobile_addl',
        'automobile_subr',
        'automobile_policy_number',
        'automobile_effective_date',
        'automobile_expiration_date',

        'automobile_combine',
        'automobile_injury_person',
        'automobile_injury_accident',
        'automobile_property_damage',
        'automobile_other',

        'automobile_combine_limit',
        'automobile_injury_person_limit',
        'automobile_injury_accident_limit',
        'automobile_property_damage_limit',
        'automobile_other_limit',

        'umbrella',
        'umbrella_occur',
        'umbrella_claim',
        'umbrella_excess',
        'umbrella_ded',
        'umbrella_retention',

        'umbrella_addl',
        'umbrella_subr',
        'umbrella_policy_number',
        'umbrella_effective_date',
        'umbrella_expiration_date',

        'umbrella_each_occurrence',
        'umbrella_aggregate',
        'umbrella_aggregate_other',
        'umbrella_each_occurrence_limit',
        'umbrella_aggregate_limit',
        'umbrella_aggregate_other_limit',

        'compensation',
        'compensation_addl',
        'compensation_subr',
        'compensation_policy_number',
        'compensation_effective_date',
        'compensation_expiration_date',

        'compensation_per_stat',
        'compensation_other',
        'compensation_each_accident',
        'compensation_disease_employee',
        'compensation_disease_policy',

        'compensation_per_stat_limit',
        'compensation_each_accident_limit',
        'compensation_disease_employee_limit',
        'compensation_disease_policy_limit',


        'special_condition',
        'certificate_holder',
        'authorize_representative',
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
