<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvidenceOfPropertyForm extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'client_id',
        'agency_id',
        'insurance_company_id',
        'loan_no',
        'is_terminated',
        'evidence_date',
        'agency_customer_id',
        'code',
        'sub_code',
        'property_description',
        'is_perils_insured',
        'is_basic',
        'is_broad',
        'is_special',
        'coverage_description',
        'insurance_amount',
        'deductible',
        'remarks',
        'name',
        'address',
        'is_additional_insured',
        'is_murtagagee',
        'is_lenders_loss_payable',
        'is_loss_payee',
        'representative_name'
    ];

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relationship with Agency
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    // Relationship with InsuranceCompany
    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }
}
