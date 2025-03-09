<?php

namespace App\Models\Forms;

use App\Models\Agent;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentBrokerForm extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'agent_id',
        'agency_id',
        'client_id',
        'insurance_company_id',
        'code',
        'sub_code',
        'current_producer',
        'agency_customer_id',
        'created_by',
        'creation_date',
        'insured_signature',
        'issued_date',
        'insured_title',
        'insured_company_name',
        'insured_company_address',
        'insured_company_city',
        'insured_company_state',
        'insured_company_zipcode'
    ];

    // Relationships
    public function agent()
    {
        return $this->hasOne(Agent::class);
    }
//    public function agency()
//    {
//        return $this->hasOne(Agent::class);
//    }

    public function insuranceCompany()
    {
        return $this->hasOne(InsuranceCompany::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }


}

