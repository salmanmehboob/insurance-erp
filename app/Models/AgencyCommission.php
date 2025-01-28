<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgencyCommission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'policy_number',
        'date',
        'transaction',
        'pro_premium',
        'commission',
        'paid',
        'due',
        'notes',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
