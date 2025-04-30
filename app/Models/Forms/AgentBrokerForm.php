<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\PolicyType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentBrokerForm extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'creation_date',

        'agency_name',
        'agency_phone',
        'agency_fax',
        'agency_address',
        'agency_city',
        'agency_state',
        'agency_zipcode',

        'insurance_company_name',
        'insurance_company_address',
        'insurance_company_city',
        'insurance_company_state',
        'insurance_company_zipcode',

        'current_agency',
        'current_producer',

        'email',
        'code',
        'sub_code',
        'agency_customer_id',

        'advice_producer_name',
        'advice_producer_effective_date',

        'insured_signature',
        'issued_date',
        'insured_title',
        'insured_company_name',
        'insured_company_address',
        'insured_company_city',
        'insured_company_state',
        'insured_company_zipcode',

        'created_by',
    ];


    public function createdBy()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function companies()
    {
        return $this->hasMany(AgentBrokerCompany::class, 'agent_broker_form_id');
    }


}

