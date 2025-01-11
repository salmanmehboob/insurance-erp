<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientMobileHomeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'value',
        'liability_limit',
        'contents',
        'flood',
        'theft',
        'deductible',
        'adjacent_structure',
        'replacement_cost',
        'make',
        'model',
        'built_year',
        'dimensions',
        'tied_down',
        'type_of_siding',
        'park_name',
        'skirted',
        'fire_place',
        'is_inside_city_limit'
    ];


}
