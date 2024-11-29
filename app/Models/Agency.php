<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'agency_name',
        'address',
        'city',
        'state_id',
        'zip_code',
        'phone',
        'secondary_phone',
        'fax',
        'account_number',
        'bank_id',
        'custom_message',
        'logo',
    ];

    // Relationship with US states
    public function state()
    {
        return $this->belongsTo(UsState::class, 'state_id');
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class, 'bank_id');
    }
}
