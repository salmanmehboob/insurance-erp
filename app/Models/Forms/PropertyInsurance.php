<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyInsurance extends Model
{
    use  HasFactory;

    protected $table = 'property_insurances';
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
        'property_description',

        'property_causes_loss',
        'property_deductible',
        'property_building',
        'property_contents',
        'property_basic',
        'property_broad',
        'property_special',
        'property_earthquake',
        'property_wind',
        'property_flood',
        'property_other_one',
        'property_other_two',
        'property_policy_number',
        'property_effective_date',
        'property_expiration_date',

        'property_coverage_building',
        'property_coverage_building_limit',
        'property_coverage_personal',
        'property_coverage_personal_limit',
        'property_coverage_income',
        'property_coverage_income_limit',
        'property_coverage_expense',
        'property_coverage_expense_limit',
        'property_coverage_rental',
        'property_coverage_rental_limit',
        'property_coverage_b_building',
        'property_coverage_b_building_limit',
        'property_coverage_b_prop',
        'property_coverage_b_prop_limit',
        'property_coverage_b_pp',
        'property_coverage_b_pp_limit',
        'property_coverage_other_one',
        'property_coverage_other_one_limit',
        'property_coverage_other_two',
        'property_coverage_other_two_limit',

        'inland_causes',
        'inland_perils',
        'inland_other',
        'inland_policy_type',
        'inland_policy_number',
        'inland_policy_effective_date',
        'inland_policy_expiration_date',

        'inland_coverage_one',
        'inland_coverage_one_limit',
        'inland_coverage_two',
        'inland_coverage_two_limit',
        'inland_coverage_three',
        'inland_coverage_three_limit',
        'inland_coverage_four',
        'inland_coverage_four_limit',

        'crime_policy_type',
        'crime_policy_number',
        'crime_effective_date',
        'crime_expiration_date',

        'crime_coverage_one',
        'crime_coverage_one_limit',
        'crime_coverage_two',
        'crime_coverage_two_limit',
        'crime_coverage_three',
        'crime_coverage_three_limit',

        'machinery_policy_number',
        'machinery_effective_date',
        'machinery_expiration_date',

        'machinery_coverage_one',
        'machinery_coverage_one_limit',
        'machinery_coverage_two',
        'machinery_coverage_two_limit',

        'other_type',
        'other_policy_number',
        'other_effective_date',
        'other_expiration_date',

        'other_coverage_one',
        'other_coverage_one_limit',
        'other_coverage_two',
        'other_coverage_two_limit',

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
