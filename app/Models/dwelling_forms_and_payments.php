<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_forms_and_payments extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_forms_and_payments';

    protected $fillable = [
        'dwelling_fire_id',
        'paymentPlan_billing',
        'paymentPlan_deposit',
        'paymentPlan_estTotal',
        'paymentPlan_directBillP',
        'paymentPlan_fullPay',
        'paymentPlan_BIMonthly',
        'paymentPlan_cash',
        'paymentPlan_EFT',
        'paymentPlan_Agent',
        'paymentPlan_directBillAcct',
        'paymentPlan_annual',
        'paymentPlan_monthly',
        'paymentPlan_check',
        'paymentPlan_payroll',
        'paymentPlan_Insured',
        'paymentPlan_agentBill',
        'paymentPlan_semiAnnual',
        'paymentPlan_other1Check',
        'paymentPlan_other1CheckField',
        'paymentPlan_creditCard',
        'paymentPlan_preAuth',
        'paymentPlan_other2Check',
        'paymentPlan_other2CheckField',
        'paymentPlan_quaterly',
        'premium_financed',
        'paymentPlan_financeCompany',
        'prem_insured',
        'prem_morg',
        'prem_othCheck',
        'prem_othCheckFiled',
    ];

    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
