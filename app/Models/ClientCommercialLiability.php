<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientCommercialLiability extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',

        'general_aggregate',
        'product_aggregate',
        'personal_injury',
        'each_occurrence',
        'fire_damage',
        'medical_expense',
        'annual_receipt',

    ];


}
