<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class CommercialInsuranceApplication extends Model
{
    use  HasFactory;

    protected $fillable = [
            'client_id',
            'application_date',
            'agency_name',
            'agency_address',
            'agency_city',
            'agency_state',
            'agency_zipcode',
            'agency_contact_name',
            'agency_contact_phone_no',
            'agency_contact_fax_no',
            'agency_contact_email',
            'agency_code',
            'agency_sub_code',
            'agency_customer_id',
            'carrier',
            'naic_code',
            'program_name',
            'program_code',
            'policy_number',
            'under_writer',
            'under_writer_office',
            'status_quote',
            'status_issue_policy',
            'status_renew',
            'status_bound',
            'status_change',
            'status_cancel',
            'status_date',
            'status_time',
            'status_time_type',
            'boiler_machinery',
            'boiler_machinery_premium_one',
            'boiler_machinery_cyber_privacy',
            'boiler_machinery_premium_two',
            'boiler_machinery_yacht',
            'boiler_machinery_premium_three',
            'business_auto',
            'business_auto_premium_one',
            'business_auto_fiduciary',
            'business_auto_premium_two',
            'business_auto_yacht_one',
            'business_auto_yacht_one_field',
            'business_auto_premium_three',
            'business_owner',
            'business_owner_premium_one',
            'business_owner_garage',
            'business_owner_premium_two',
            'business_owner_yacht_two',
            'business_owner_yacht_two_field',
            'business_owner_premium_three',
            'business_commercial_gl',
            'business_commercial_gl_premium_one',
            'business_commercial_gl_liquor',
            'business_commercial_gl_premium_two',
            'business_commercial_gl_yacht_three',
            'business_commercial_gl_yacht_three_field',
            'business_commercial_gl_premium_three',
            'business_inland',
            'business_inland_premium_one',
            'business_inland_motor',
            'business_inland_premium_two',
            'business_inland_yacht_four',
            'business_inland_yacht_four_field',
            'business_inland_premium_three',
            'commercial_property',
            'commercial_property_premium_one',
            'commercial_property_trucker',
            'commercial_property_premium_two',
            'commercial_property_yacht_five',
            'commercial_property_yacht_five_field',
            'commercial_property_premium_three',
            'crime',
            'crime_premium_one',
            'crime_umbrella',
            'crime_yacht_six',
            'crime_yacht_six_field',
            'crime_premium_three',
            'attachment_accounts_receivable',
            'attachment_glass_sign',
            'attachment_statement',
            'attachment_additional_interest',
            'attachment_hotel',
            'attachment_state_supplement',
            'attachment_addition_premises',
            'attachment_installation_risk',
            'attachment_vacant_building',
            'attachment_appartment_building',
            'attachment_international_liability',
            'attachment_vehicle_schedule',
            'attachment_condo_assn',
            'attachment_internation_property_exposer',
            'attachment_default_check_one',
            'attachment_default_check_one_field',
            'attachment_contractors_supplement',
            'attachment_loss_summary',
            'attachment_default_check_two',
            'attachment_default_check_two_field',
            'attachment_coverages_schedule',
            'attachment_open_cargo_section',
            'attachment_default_check_three',
            'attachment_default_check_three_field',
            'attachment_dealers_section',
            'attachment_premium_payment',
            'attachment_default_check_four',
            'attachment_default_check_four_field',
            'attachment_driver_infomation',
            'attachment_professional_liability',
            'attachment_default_check_five',
            'attachment_default_check_five_field',
            'attachment_electronic_data',
            'attachment_restauratt',
            'attachment_default_check_six',
            'attachment_default_check_six_field',
            'policy_proposed_eff_date',
            'policy_proposed_exp_date',
            'policy_billing_plan',
            'policy_payment_plan',
            'policy_method_of_payment',
            'policy_audit',
            'policy_deposit',
            'policy_minimum_premium',
            'policy_premium',
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

    public function applicationInfo(): HasOne
    {
        return $this->hasOne(ciaApplicationInfo::class, 'commerical_appId');
    }

    public function business(): HasOne
    {
        return $this->hasOne(ciaBusiness::class, 'commerical_appId');
    }

    public function otherInfo(): HasOne
    {
        return $this->hasOne(ciaOtherInfo::class, 'commerical_appId');
    }

    public function history(): HasOne
    {
        return $this->hasOne(ciaHistory::class, 'commerical_appId');
    }
}
