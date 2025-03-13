<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalRemarkForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'agency_id',
        'created_by',
        'insurance_company_id',
        'agent_id',
        'form_no',
        'form_title',
        'description',
        'agency_customer_id',
        'loc',
        'naic_code',
    ];

    /**
     * Relationships
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
