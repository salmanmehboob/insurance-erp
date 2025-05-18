<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePayment extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'client_id',  'invoice_no', 'agency_name', 'agency_phone', 'agency_fax', 'agency_address', 'agency_city',
        'agency_state', 'agency_zipcode', 'insured_company_name', 'insured_company_address',
        'insured_company_city', 'insured_company_state', 'insured_company_zipcode', 'company_name',
        'company_fax', 'policy_number', 'invoice_date', 'total_amount', 'note'
    ];


    public function items()
    {
        return $this->hasMany(InvoicePaymentItem::class);
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}
