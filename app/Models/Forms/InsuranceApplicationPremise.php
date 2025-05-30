<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplicationPremise   extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',

        // Premises One
        'premises_loc_one', 'premises_bld_one', 'premises_street_one', 'premises_city_one',
        'premises_state_one', 'premises_zipcode_one', 'premises_country_one', 'premises_city_limit_one',
        'premises_interest_one', 'premises_full_employee_one', 'premises_annual_revenue_one',
        'premises_occupied_area_one', 'premises_part_employee_one', 'premises_public_area_one',
        'premises_building_area_one', 'premises_leased_one', 'premises_description_one',

        // Premises Two
        'premises_loc_two', 'premises_bld_two', 'premises_street_two', 'premises_city_two',
        'premises_state_two', 'premises_zipcode_two', 'premises_country_two', 'premises_city_limit_two',
        'premises_interest_two', 'premises_full_employee_two', 'premises_annual_revenue_two',
        'premises_occupied_area_two', 'premises_part_employee_two', 'premises_public_area_two',
        'premises_building_area_two', 'premises_leased_two', 'premises_description_two',

        // Premises Three
        'premises_loc_three', 'premises_bld_three', 'premises_street_three', 'premises_city_three',
        'premises_state_three', 'premises_zipcode_three', 'premises_country_three', 'premises_city_limit_three',
        'premises_interest_three', 'premises_full_employee_three', 'premises_annual_revenue_three',
        'premises_occupied_area_three', 'premises_part_employee_three', 'premises_public_area_three',
        'premises_building_area_three', 'premises_leased_three', 'premises_description_three',

        // Premises Four
        'premises_loc_four', 'premises_bld_four', 'premises_street_four', 'premises_city_four',
        'premises_state_four', 'premises_zipcode_four', 'premises_country_four', 'premises_city_limit_four',
        'premises_interest_four', 'premises_full_employee_four', 'premises_annual_revenue_four',
        'premises_occupied_area_four', 'premises_part_employee_four', 'premises_public_area_four',
        'premises_building_area_four', 'premises_leased_four', 'premises_description_four',

        // Nature
        'nature_apartment', 'nature_condom', 'nature_contractor', 'nature_institutional',
        'nature_manufacture', 'nature_office', 'nature_restaurant', 'nature_retail',
        'nature_service', 'nature_wholesale', 'nature_start_date', 'nature_description',
        'nature_total_sale', 'nature_installation', 'nature_off_premises', 'nature_description_operation',

        // Interest
        'interest_additional', 'interest_breach', 'interest_co_owner', 'interest_lessor',
        'interest_leaseback', 'interest_loss', 'interest_holder', 'interest_loss_payee',
        'interest_mortgagee', 'interest_owner', 'interest_registrant', 'interest_trustee',
        'interest_other', 'interest_type', 'interest_name', 'interest_address',
        'interest_rank', 'interest_reference', 'interest_end_date', 'interest_line_amount',
        'interest_phone', 'interest_fax', 'interest_email', 'interest_location',
        'interest_building', 'interest_vehicle', 'interest_boat', 'interest_airport',
        'interest_aircraft', 'interest_item_class', 'interest_item', 'interest_item_description',
        'interest_reason',
    ];

    public function application()
    {
        return $this->belongsTo(InsuranceApplication::class, 'application_id');
    }
}
