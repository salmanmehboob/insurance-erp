<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'account_holder_name',
        'account_number',
        'bank_name',
        'branch_name',
        'ifsc_code',
        'current_balance',
        'current_check',
        'agency_id',
        'account_type',
        'is_active',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class,  'agency_id');
    }

}
