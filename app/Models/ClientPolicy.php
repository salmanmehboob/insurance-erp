<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'policy_status_id',
        'term_id',
        'effective_date',
        'expiration_date',
        'sold_date',
        'file_number',
        'policy_number',
        'insurance_company_id',
        'agent_id',
        'agency_id',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }
    public function language()
    {
        return $this->belongsTo(PrimaryLanguage::class);
    }

    public function policyStatus()
    {
        return $this->belongsTo(PolicyStatus::class);
    }
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
