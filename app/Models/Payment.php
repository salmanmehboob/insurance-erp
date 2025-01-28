<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'insurance_company_id',
        'policy_number',
        'payment_date',
        'payment_for',
        'payment_method',
        'amount',
        'agency_fee',
        'total',
        'paid',
        'balance',
        'received_by',
        'received_at',
        'check_to_finance',
        'payment_send_to_insurance_company',
        'notes',
        'bank_id',
        'next_payment',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function receivedBy()
    {
        return $this->belongsTo(Agent::class,'received_by');
    }

    public function location()
    {
        return $this->belongsTo(Agency::class,'received_at');
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
