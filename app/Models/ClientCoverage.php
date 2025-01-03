<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientCoverage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'body_injury',
        'property_damage',
        'medical_payments',
        'pip',
        'uninsured_body_injury',
        'uninsured_property_damage',
        'under_insured_body_injury',
        'under_insured_property_damage',
    ];


}
