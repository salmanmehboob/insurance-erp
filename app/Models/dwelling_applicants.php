<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_applicants extends Model
{
     use  HasFactory;

    protected $table = 'dwelling_applicants';

    protected $fillable = [
        'dwelling_fire_id',
        'applicant_agency_name',
        'applicant_agency_address',
        'applicant_agency_city',
        'applicant_agency_state',
        'applicant_agency_zipCode',
        'applicant_birthday',
        'applicant_socialSecurity',
        'applicant_maritalStatus',
        'applicant_primaryPhone',
        'applicant_primaryhome',
        'applicant_primarybuss',
        'applicant_primarycell',
        'applicant_secondaryPhone',
        'applicant_secondaryhome',
        'applicant_secondarybuss',
        'applicant_secondarycell',
        'applicant_previousAddress',
        'applicant_yearPreviousAdd',
        'applicant_occupation',
        'applicant_mailingName',
        'applicant_mailingaddress',
        'applicant_mailing_city',
        'applicant_mailing_state',
        'applicant_mailing_zipCode',
        'applicant_mailingdate',
        'applicant_mailingPrimaryEmail',
        'applicant_mailingSecondaryEmail',
        'dwellingLocationCheck',
        'applicant_yearCurrentOc',
        'applicant_yearWCEmployeer',
        'applicant_yearWPEmployeer',
    ];
    
    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
