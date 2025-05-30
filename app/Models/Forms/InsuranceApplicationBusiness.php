<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplicationBusiness extends Model
{
    use  HasFactory;

    protected $guarded = [];
    protected $table = 'insurance_application_business';

    protected $fillable = [
        'insurance_application_id',

        'business_boiler',
        'business_boiler_limit',

        'business_auto',
        'business_auto_limit',

        'business_owner',
        'business_owner_limit',

        'business_commercial_gl',
        'business_commercial_gl_limit',

        'business_inland',
        'business_inland_limit',

        'business_property',
        'business_property_limit',

        'business_crime',
        'business_crime_limit',

        'business_cyber',
        'business_cyber_limit',

        'business_fiduciary',
        'business_fiduciary_limit',

        'business_garage',
        'business_garage_limit',

        'business_liquor',
        'business_liquor_limit',

        'business_motor',
        'business_motor_limit',

        'business_trucker',
        'business_trucker_limit',

        'business_umbrella',
        'business_umbrella_limit',

        'business_yacht',
        'business_yacht_limit',
    ];

    public function insuranceApplication()
    {
        return $this->belongsTo(InsuranceApplication::class);
    }
}
