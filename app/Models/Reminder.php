<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'from_id',
        'to_id',
        'insurance_company_id',
        'date',
        'set_reminder',
        'is_critical',
        'notes',
        'is_seen',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function reminderFrom()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function reminderTo()
    {
        return $this->belongsTo(Agent::class, 'to_id');
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

}
