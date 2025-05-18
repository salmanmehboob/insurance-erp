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
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'client_id',
        'invoice_date',

        'agency_name',
        'agency_address',
        'agency_city',
        'agency_state',
        'agency_zipcode',
        'company_name',
        'agency_phone',
        'agency_fax',
        'agency_email',
        'agency_code',
        'agency_subcode',
        'agency_customer_id',

        'loan_number',
        'policy_number',

        'insured_name',
        'insured_address',
        'insured_city',
        'insured_state',
        'insured_zipcode',

        'effective_date',
        'expiration_date',
        'is_terminated',
        'evidence_date',

        'property_information',
        'is_perlis',
        'is_basic',
        'is_broad',
        'is_special',
        'location_description',
        'coverage',
        'amount',
        'deductible',
        'remarks',

        'additional_interest_name',
        'additional_interest_address',
        'additional_interest_city',
        'additional_interest_state',
        'additional_interest_zipcode',
        'additional_insured',
        'lenders_loss_payable',
        'loss_payee',
        'mortgagee',
        'additional_interest_loan',
        'authorized_representative',

        'created_by',


    ];

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
