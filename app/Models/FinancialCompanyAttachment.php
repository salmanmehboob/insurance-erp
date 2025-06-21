<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialCompanyAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'financial_company_id',
        'attachment_name',
        'path',
    ];

    // Relationships
    public function financialCompany()
    {
        return $this->belongsTo(FinancialCompany::class, 'financial_company_id');
    }
}
