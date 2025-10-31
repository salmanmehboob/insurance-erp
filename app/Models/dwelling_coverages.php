<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_coverages extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_coverages';

    protected $fillable = [
        'dwelling_fire_id',
        'coverage_fire',
        'coverage_fireEC',
        'coverage_fireECVM',
        'coverage_broad',
        'coverage_special',
        'coverage_s1_limit',
        'coverage_s1_premium',
        'coverage_s1_option_check',
        'coverage_s1s_limits',
        'coverage_s1s_premium',
        'coverage_s2_option_check',
        'coverage_s2_option_checkField',
        'coverage_s2_prem',
        'coverage_s2s_option_check',
        'coverage_s2s_prem',
        'coverage_s3_option_check',
        'coverage_s3_prem',
        'coverage_s4_prem',
        'coverage_s5_prem',
        'totalPremLocation',
        'lossUse_sustained',
        'lossUse_sustainedamount',
        'lossUse_prem',
        'base_s1_amount',
        'base_s1_percent',
        'base_s1_type',
        'base_s2_amount',
        'base_s2_percent',
        'base_s2_type',
        'wind_s1_amount',
        'wind_s1_percent',
        'wind_s1_type',
        'wind_s2_amount',
        'wind_s2_percent',
        'wind_s2_type',
        'theift_s1_amount',
        'theift_s1_percent',
        'theift_s1_type',
        'theift_s1_other',
        'theift_s2_amount',
        'theift_s2_percent',
        'theift_s2_type',
        'otherR1_s1_title',
        'otherR1_s1_amount',
        'otherR1_s1_percent',
        'otherR1_s1_type',
        'otherR1_s1_other',
        'otherR1_s2_amount',
        'otherR1_s2_percent',
        'otherR1_s2_type',
        'otherR2_s1_title',
        'otherR2_s1_amount',
        'otherR2_s1_percent',
        'otherR2_s1_type',
        'otherR2_s1_other',
        'otherR2_s2_amount',
        'otherR2_s2_percent',
        'otherR2_s2_type',
        'otherR3_s1_title',
        'otherR3_s1_amount',
        'otherR3_s1_percent',
        'otherR3_s1_type',
        'includedDwellingStructure',
        'blanket_limit',
        'blanket_prem',
        'rental_limit_check',
        'rental_limit_checkField',
        'rental_prem',
        'addition_limit',
        'addition_prem',
        'personalLib_limit',
        'personalLib_prem',
        'medicalPay_limit',
        'medicalPay_prem',
    ];   
    
    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
