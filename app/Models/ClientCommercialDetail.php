<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientCommercialDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'type_of_business',
        'year_of_experience',
        'special_license',
        'employment_number',
        'employment_payroll',
        'current_inst',
        'quote_expiry',
        'general_aggregate',
        'product_aggregate',
        'personal_injury',
        'each_occurrence',
        'fire_damage',
        'medical_expense',
        'annual_receipt',
        'building',
        'contents',
        'loss_of_earning',
        'pump',
        'sign',
        'glass',
        'other_commercial_property',
        'property_owner',
        'built_year',
        'property_area',
        'age_of_roof',
        'construction',
        'is_alarm_system',
    ];


}
