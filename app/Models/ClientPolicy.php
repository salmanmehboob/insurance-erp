<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPolicy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id' ,
        'policy_status_id',
        'term_id',
        'effective_date',
        'expiration_date' ,
        'sold_date' ,
        'file_number',
        'policy_number',
        'insurance_company_id',
        'agent_id',
        'agency_id',
    ];




}
