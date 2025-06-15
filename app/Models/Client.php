<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\Mime\Email;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'policy_type_id',
        'applicant_name',
        'business_name',
        'address',
        'city',
        'state_id',
        'zip_code',
        'email',
        'home_phone_no',
        'cell_phone_no',
        'work_phone_no',
        'fax_phone_no',
        'email_status_id',
        'primary_language_id',
        'anniversary',

        'is_quote_sheet',
        'quote_date',
        'current_carrier',
        'current_carrier_expiration',

        'dba',
        'corp_if_any',
        'type_of_insurance',
        'loss_history',
        'structure',
        'wiring',
        'heating',
        'plumbing',
        'no_of_employee',
        'estimated_annually_payroll',
        'estimated_annually_receipts',
        'workers_compensation',
        'no_of_additional_insured',
        'waiver_of_subrogation',


        'business_description',
        'use_each_vehicle',
        'radius_operation',
        'states_driven',
        'owner_operated_for_hire',
        'contract_name',
        'common_coverage',
        'common_coverage_effective_date',
        'common_coverage_expiry_date',
        'coverage_needed',
        'liability_limit_needed',
        'uim',
        'pip',
        'is_cargo_needed_insured',
        'cargo_needed_insured_detail',
        'is_truck_overnight',
        'is_alarm_system',
        'is_trailer_lock',


        'insurance_company_id',
        'purchase_date',
        'purchase_price',
        'date_cov_needed',
        'city_limit',
        'stories',
        'any_business_on_premises',
        'swimming_pool_tubs',
        'trampoline',
        'animal_on_premises',
        'coverage_type',

        'coverage_request',
        'prior_coverage',
        'coverage_expiration',
        'claim_amount',
        'owner',
        'tenant',
        'is_any_pet',
        'bankruptcy',
        'company',
    ];


    public function policyType()
    {
        return $this->belongsTo(PolicyType::class);
    }

    public function emailStatus()
    {
        return $this->belongsTo(EmailStatus::class);
    }

    public function language()
    {
        return $this->belongsTo(PrimaryLanguage::class);
    }

    public function commercial()
    {
        return $this->hasOne(ClientCommercialDetail::class);
    }

    public function commercialLiability()
    {
        return $this->hasOne(ClientCommercialLiability::class);
    }

    public function coverage()
    {
        return $this->hasOne(ClientCoverage::class);
    }

    public function drivers()
    {
        return $this->hasMany(ClientDriver::class);
    }

    public function note()
    {
        return $this->hasOne(ClientNotes::class);
    }

    public function payment()
    {
        return $this->hasOne(ClientPayment::class);
    }

    public function house()
    {
        return $this->hasOne(ClientHouseDetail::class);
    }

    public function mobileHome()
    {
        return $this->hasOne(ClientMobileHomeDetail::class);
    }

    public function policy()
    {
        return $this->hasOne(ClientPolicy::class);
    }

    public function vehicles()
    {
        return $this->hasMany(ClientVehicle::class);
    }
}
