<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'initial_premium',
        'prorated_endorsement',
        'premium_addon',
        'company_fee',
        'agency_fee',
        'total_prorated',
        'down_payment',
        'monthly_payment',
        'initial_agency_commission',
        'primary_agency_commission',
        'secondary_agency_commission',
        'total_premium',
        'total_company_fee',
        'total_agency_fee',
        'total',
        'payment_option',
        'payment_due_days',
        'insurance_company_id',
        'financial_company',
    ];
}
