<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\Mime\Email;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'policy_type_id',
        'applicant_name',
        'address',
        'city',
        'state_id',
        'zip_code',
        'email',
        'home_phone_no',
        'cell_phone_no',
        'work_phone_no',
        'fax_phone_no',
        'email_status_id',
        'primary_language_id',
        'anniversary',

        'is_quote_sheet' ,
        'quote_date' ,
        'current_carrier' ,
        'current_carrier_expiration',
    ];


    public function policyType()
    {
        return $this->belongsTo(PolicyType::class);
    }

    public function emailStatus()
    {
        return $this->belongsTo(EmailStatus::class);
    }

    public function language()
    {
        return $this->belongsTo(PrimaryLanguage::class);
    }

    public function commercial()
    {
        return $this->hasOne(ClientCommercialDetail::class);
    }

    public function commercialLiability()
    {
        return $this->hasOne(ClientCommercialLiability::class);
    }

    public function coverage()
    {
        return $this->hasOne(ClientCoverage::class);
    }

    public function drivers()
    {
        return $this->hasMany(ClientDriver::class);
    }

    public function note()
    {
        return $this->hasOne(ClientNotes::class);
    }

    public function payment()
    {
        return $this->hasOne(ClientPayment::class);
    }

    public function house()
    {
        return $this->hasOne(ClientHouseDetail::class);
    }

    public function mobileHome()
    {
        return $this->hasOne(ClientMobileHomeDetail::class);
    }

    public function policy()
    {
        return $this->hasOne(ClientPolicy::class);
    }

    public function vehicles()
    {
        return $this->hasMany(ClientVehicle::class);
    }
}
