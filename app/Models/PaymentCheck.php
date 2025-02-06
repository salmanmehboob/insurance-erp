<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCheck extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bank_id',
        'check_no',
        'payment_date',
        'pay_to',
        'client_id',
        'insurance_company_id',
        'policy_number',
        'amount',
        'notes',
        'account',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function payTo()
    {
        return $this->belongsTo(InsuranceCompany::class, 'pay_to');
    }
    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

}
