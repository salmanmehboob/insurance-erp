<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompanyAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'insurance_company_id',
        'attachment_name',
        'path',
    ];

    // Relationships
    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id');
    }
}
