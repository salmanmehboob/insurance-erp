<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientAccident extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_driver_id',
        'date',
        'violation',

    ];


}
