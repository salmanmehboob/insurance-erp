<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalRemarkForm extends Model
{
    protected $fillable = [
        'agency_customer_id',
        'loc',
        'agency_name',
        'name_insured',
        'policy_number',
        'carrier',
        'naic_code',
        'effective_date',
        'form_no',
        'form_title',
        'created_by',
        'description',
    ];

    use HasFactory, SoftDeletes;

    /**
     * Relationships
     */

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
