<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePaymentForm extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'invoice_no',
        'agency_name',
        'agency_phone',
        'agency_fax',
        'agency_address',
        'agency_city',
        'agency_state',
        'agency_zipcode',
        'insured_company_name',
        'insured_company_address',
        'insured_company_city',
        'insured_company_state',
        'insured_company_zipcode',
        'company_name',
        'company_fax',
        'policy_number',
        'invoice_date',
        'total_amount',
        'note',
    ];


}
