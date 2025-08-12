<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyLoss extends Model
{
    use  HasFactory;

    protected $table = 'property_loss';
    protected $fillable = [
        'client_id',
        'invoice_date',
        'agency_name',
        'agency_address',
        'agency_city',
        'agency_state',
        'agency_zipcode',
        'agency_phone',
        'agency_contact_name',
        'agency_fax',
        'agency_email',
        'agency_code',
        'agency_sub_code',
        'agency_customer_id',

        'location_code',
        'date_of_loss',
        'time_of_loss',

        'property_carrier',
        'property_naic_code',
        'property_policy_number',
        'property_business',

        'flood_carrier',
        'flood_naic_code',
        'flood_policy_number',

        'wind_carrier',
        'wind_naic_code',
            'wind_policy_number',

        'insured_name',
        'insured_address',
        'insured_city',
        'insured_state',
        'insured_zipcode',
        'insured_dob',
        'insured_fein',
        'insured_marital_status',
        'insured_phone_primary',
        'insured_phone_primary_type',
        'insured_phone_secondary',
        'insured_phone_secondary_type',
        'insured_email_primary',
        'insured_email_secondary',

        'spouse_name',
        'spouse_address',
        'spouse_city',
        'spouse_state',
        'spouse_zipcode',
        'spouse_dob',
        'spouse_fein',
        'spouse_marital_status',
        'spouse_phone_primary',
        'spouse_phone_primary_type',
        'spouse_phone_secondary',
        'spouse_phone_secondary_type',
        'spouse_email_primary',
        'spouse_email_secondary',

        'contact_name',
        'contact_address',
        'contact_city',
        'contact_state',
        'contact_zipcode',
        'contact_when',
        'contact_phone_primary',
        'contact_phone_primary_type',
        'contact_phone_secondary',
        'contact_phone_secondary_type',
        'contact_email_primary',
        'contact_email_secondary',

        'loss_address',
        'loss_city',
        'loss_state',
        'loss_zipcode',
        'loss_country',
        'loss_police_contact',
        'loss_police_report',
        'loss_location',
        'loss_type',
        'loss_type_other',
        'loss_amount',
        'loss_description',
        'report_by',
        'report_to',
        'created_by',
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
