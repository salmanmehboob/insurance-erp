<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'vin',
        'year_id',
        'vehicle_make_id',
        'vehicle_model_id',
        'comprehensive',
        'collision',
        'rental',
        'towing',
        'custom_equipment',
    ];
}
