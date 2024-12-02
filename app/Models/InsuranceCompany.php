<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompany extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'city',
        'state_id',
        'zip_code',
        'phone_no',
        'note',
        'fax_no',
        'website',
        'agency_code',
        'commission_in_percentage',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function state()
    {
        return $this->belongsTo(UsState::class, 'state_id');
    }

    public function attachments()
    {
        return $this->hasMany(InsuranceCompanyAttachment::class, 'insurance_company_id');
    }
}

