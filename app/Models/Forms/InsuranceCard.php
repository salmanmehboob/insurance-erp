<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCard extends Model
{
    use  HasFactory;

    protected $fillable = [
        'client_id',

        'company_number',
        'company_name',
        'type',
        'policy_number',
        'effective_date',
        'expiration_date',
        'year',
        'make',
        'vehicle_number',

        'agency_name',
        'agency_address',
        'agency_city',
        'agency_state',
        'agency_zipcode',

        'insured_name',
        'insured_address',
        'insured_city',
        'insured_state',
        'insured_zipcode',

        'created_by',
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
