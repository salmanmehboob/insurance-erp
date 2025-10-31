<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class dwelling_fire_application extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_fire_application';

    protected $fillable = [
            'client_id',
            'invoideDate',
            'agency_name',
            'agency_address',
            'agency_city',
            'agency_state',
            'agency_zipCode',
            'contact_name',
            'contact_phone',
            'contact_fax',
            'contact_email',
            'code',
            'subcode',
            'agency_cust_id',
            'carier',
            'naicCode',
            'nameIsured',
            'policyNumber',
            'plan',
            'facilityCode',
            'expirationDate',
            'effectiveDate',
            'dateAgentLastInspect',
            'knownApplicant',
            'created_by'
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function dwelling_applicants(): HasOne
    {
        return $this->hasOne(dwelling_applicants::class, 'dwelling_fire_id');
    }

    public function dwelling_coverages(): HasOne
    {
        return $this->hasOne(dwelling_coverages::class, 'dwelling_fire_id');
    }

    public function dwelling_forms_and_payments(): HasOne
    {
        return $this->hasOne(dwelling_forms_and_payments::class, 'dwelling_fire_id');
    }

    public function dwelling_rating(): HasOne
    {
        return $this->hasOne(dwelling_rating::class, 'dwelling_fire_id');
    }

    public function dwelling_option_coverage(): HasOne
    {
        return $this->hasOne(dwelling_option_coverage::class, 'dwelling_fire_id');
    }

    public function dwelling_general_info(): HasOne
    {
        return $this->hasOne(dwelling_general_info::class, 'dwelling_fire_id');
    }

    public function dwelling_general_info_residential(): HasOne
    {
        return $this->hasOne(dwelling_general_info_residential::class, 'dwelling_fire_id');
    }

    public function dwelling_prior_coverages(): HasOne
    {
        return $this->hasOne(dwelling_prior_coverages::class, 'dwelling_fire_id');
    }

    public function dwelling_remarks(): HasOne
    {
        return $this->hasOne(dwelling_remarks::class, 'dwelling_fire_id');
    }

    public function dwelling_biners(): HasOne
    {
        return $this->hasOne(dwelling_biners::class, 'dwelling_fire_id');
    }
    
    public function dwelling_forms(): HasOne
    {
        return $this->hasOne(dwelling_forms::class, 'dwelling_fire_id');
    }
}
