<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientHouseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'dwelling_building',
        'liability_limit',
        'contents',
        'medical_payment',
        'additional_structure',
        'deductible',
        'loss_of_use',
        'usage',
        'construction',
        'built_year',
        'square_footage',
        'rooms',
        'age_of_roof',
        'is_intrusion_alarm',
        'is_fire_station',
        'is_swimming_pool',
        'is_replacement_cost',
    ];


}
