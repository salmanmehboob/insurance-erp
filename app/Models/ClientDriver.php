<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientDriver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'dob',
        'age',
        'ssn_no',
        'gender_id',
        'marital_status_id',
        'relationship_id',
        'license_no',
        'us_state_id',
        'license_year',
        'cell_no',
        'education_level_id',
        'occupation',
        'industry',
    ];


}
