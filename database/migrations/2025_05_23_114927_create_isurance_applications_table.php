<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('insurance_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');


            $table->string('invoice_date', 50)->nullable();
            $table->string('agency_name', 50)->nullable();
            $table->string('agency_address', 50)->nullable();
            $table->string('agency_city', 50)->nullable();
            $table->string('agency_state', 50)->nullable();
            $table->string('agency_zipcode', 50)->nullable();

            $table->string('contact_name', 50)->nullable();
            $table->string('contact_phone_no', 50)->nullable();
            $table->string('contact_fax_no', 50)->nullable();
            $table->string('contact_email', 50)->nullable();
            $table->string('code', 50)->nullable();
            $table->string('sub_code', 50)->nullable();
            $table->string('producer_customer_id', 50)->nullable();

            $table->string('carrier', 50)->nullable();
            $table->string('program_name', 50)->nullable();
            $table->string('program_code', 50)->nullable();
            $table->string('policy_number', 50)->nullable();
            $table->string('under_writer', 50)->nullable();
            $table->string('under_writer_office', 50)->nullable();
            $table->string('under_writer_office', 50)->nullable();

            $table->string('status_quote', 50)->nullable();
            $table->string('status_bound', 50)->nullable();
            $table->string('status_change', 50)->nullable();
            $table->string('status_cancel', 50)->nullable();
            $table->string('status_issue_policy', 50)->nullable();
            $table->string('status_renew', 50)->nullable();
            $table->string('status_date', 50)->nullable();

            $table->string('business_boiler', 50)->nullable();
            $table->string('business_boiler_limit', 50)->nullable();

            $table->string('business_auto', 50)->nullable();
            $table->string('business_auto_limit', 50)->nullable();

            $table->string('business_owner', 50)->nullable();
            $table->string('business_owner_limit', 50)->nullable();

            $table->string('business_commercial_gl', 50)->nullable();
            $table->string('business_commercial_gl_limit', 50)->nullable();

            $table->string('business_inland', 50)->nullable();
            $table->string('business_inland_limit', 50)->nullable();

            $table->string('business_property', 50)->nullable();
            $table->string('business_property_limit', 50)->nullable();

            $table->string('business_crime', 50)->nullable();
            $table->string('business_crime_limit', 50)->nullable();

            $table->string('business_cyber', 50)->nullable();
            $table->string('business_cyber_limit', 50)->nullable();

            $table->string('business_fiduciary', 50)->nullable();
            $table->string('business_fiduciary_limit', 50)->nullable();

            $table->string('business_garage', 50)->nullable();
            $table->string('business_garage_limit', 50)->nullable();

            $table->string('business_liquor', 50)->nullable();
            $table->string('business_liquor_limit', 50)->nullable();

            $table->string('business_motor', 50)->nullable();
            $table->string('business_motor_limit', 50)->nullable();

            $table->string('business_trucker', 50)->nullable();
            $table->string('business_trucker_limit', 50)->nullable();

            $table->string('business_umbrella', 50)->nullable();
            $table->string('business_umbrella_limit', 50)->nullable();

            $table->string('business_yacht', 50)->nullable();
            $table->string('business_yacht_limit', 50)->nullable();

            $table->tinyInteger('attachment_account_receivable')->nullable();
            $table->tinyInteger('attachment_additional_interest')->nullable();
            $table->tinyInteger('attachment_additional_premises')->nullable();
            $table->tinyInteger('attachment_apartment')->nullable();
            $table->tinyInteger('attachment_condo')->nullable();
            $table->tinyInteger('attachment_contractor')->nullable();
            $table->tinyInteger('attachment_coverage')->nullable();
            $table->tinyInteger('attachment_dealer')->nullable();
            $table->tinyInteger('attachment_driver')->nullable();
            $table->tinyInteger('attachment_electronic')->nullable();
            $table->tinyInteger('attachment_glass')->nullable();
            $table->tinyInteger('attachment_hotel')->nullable();
            $table->tinyInteger('attachment_installation')->nullable();
            $table->tinyInteger('attachment_liability_exposure')->nullable();
            $table->tinyInteger('attachment_property_exposure')->nullable();
            $table->tinyInteger('attachment_loss')->nullable();
            $table->tinyInteger('attachment_cargo')->nullable();
            $table->tinyInteger('attachment_premium')->nullable();
            $table->tinyInteger('attachment_professional')->nullable();
            $table->tinyInteger('attachment_restaurant')->nullable();
            $table->tinyInteger('attachment_statement')->nullable();
            $table->tinyInteger('attachment_state')->nullable();
            $table->tinyInteger('attachment_vacant')->nullable();
            $table->tinyInteger('attachment_vehicle')->nullable();
            $table->string('attachment_other_one', 50)->nullable();
            $table->string('attachment_other_two', 50)->nullable();
            $table->string('attachment_other_three', 50)->nullable();
            $table->string('attachment_other_four', 50)->nullable();
            $table->string('attachment_other_five', 50)->nullable();
            $table->string('attachment_other_six', 50)->nullable();

            $table->string('policy_effective_date', 50)->nullable();
            $table->string('policy_expiration_date', 50)->nullable();
            $table->string('policy_billing_plan', 50)->nullable();
            $table->string('policy_payment_plan', 50)->nullable();
            $table->string('policy_payment_method', 50)->nullable();
            $table->string('policy_audit', 50)->nullable();
            $table->string('policy_deposit', 50)->nullable();
            $table->string('policy_minimum_premium', 50)->nullable();
            $table->string('policy_policy_premium', 50)->nullable();

            $table->string('applicant_one_name', 50)->nullable();
            $table->string('applicant_one_address', 50)->nullable();
            $table->string('applicant_one_city', 50)->nullable();
            $table->string('applicant_one_state', 50)->nullable();
            $table->string('applicant_one_zipcode', 50)->nullable();
            $table->string('applicant_one_gl_code', 50)->nullable();
            $table->string('applicant_one_sic_code', 50)->nullable();
            $table->string('applicant_one_naic_code', 50)->nullable();
            $table->string('applicant_one_soc_code', 50)->nullable();
            $table->string('applicant_one_soc_code', 50)->nullable();
            $table->string('applicant_one_phone', 50)->nullable();
            $table->string('applicant_one_website', 50)->nullable();
            $table->string('applicant_one_corporation', 50)->nullable();
            $table->tinyInteger('applicant_one_corporation')->nullable();
            $table->tinyInteger('applicant_one_individual')->nullable();
            $table->tinyInteger('applicant_one_joint_adventure')->nullable();
            $table->tinyInteger('applicant_one_llc')->nullable();
            $table->string('applicant_one_members', 50)->nullable();
            $table->tinyInteger('applicant_one_non_profit')->nullable();
            $table->tinyInteger('applicant_one_partnership')->nullable();
            $table->tinyInteger('applicant_one_sub_chapter')->nullable();
            $table->tinyInteger('applicant_one_trust')->nullable();
            $table->tinyInteger('applicant_one_other')->nullable();

            $table->string('applicant_two_name', 50)->nullable();
            $table->string('applicant_two_address', 50)->nullable();
            $table->string('applicant_two_city', 50)->nullable();
            $table->string('applicant_two_state', 50)->nullable();
            $table->string('applicant_two_zipcode', 50)->nullable();
            $table->string('applicant_two_gl_code', 50)->nullable();
            $table->string('applicant_two_sic_code', 50)->nullable();
            $table->string('applicant_two_naic_code', 50)->nullable();
            $table->string('applicant_two_soc_code', 50)->nullable();
            $table->string('applicant_two_soc_code', 50)->nullable();
            $table->string('applicant_two_phone', 50)->nullable();
            $table->string('applicant_two_website', 50)->nullable();
            $table->string('applicant_two_corporation', 50)->nullable();
            $table->tinyInteger('applicant_two_corporation')->nullable();
            $table->tinyInteger('applicant_two_individual')->nullable();
            $table->tinyInteger('applicant_two_joint_adventure')->nullable();
            $table->tinyInteger('applicant_two_llc')->nullable();
            $table->string('applicant_two_members', 50)->nullable();
            $table->tinyInteger('applicant_two_non_profit')->nullable();
            $table->tinyInteger('applicant_two_partnership')->nullable();
            $table->tinyInteger('applicant_two_sub_chapter')->nullable();
            $table->tinyInteger('applicant_two_trust')->nullable();
            $table->tinyInteger('applicant_two_other')->nullable();

            $table->string('applicant_three_name', 50)->nullable();
            $table->string('applicant_three_address', 50)->nullable();
            $table->string('applicant_three_city', 50)->nullable();
            $table->string('applicant_three_state', 50)->nullable();
            $table->string('applicant_three_zipcode', 50)->nullable();
            $table->string('applicant_three_gl_code', 50)->nullable();
            $table->string('applicant_three_sic_code', 50)->nullable();
            $table->string('applicant_three_naic_code', 50)->nullable();
            $table->string('applicant_three_soc_code', 50)->nullable();
            $table->string('applicant_three_soc_code', 50)->nullable();
            $table->string('applicant_three_phone', 50)->nullable();
            $table->string('applicant_three_website', 50)->nullable();
            $table->string('applicant_three_corporation', 50)->nullable();
            $table->tinyInteger('applicant_three_corporation')->nullable();
            $table->tinyInteger('applicant_three_individual')->nullable();
            $table->tinyInteger('applicant_three_joint_adventure')->nullable();
            $table->tinyInteger('applicant_three_llc')->nullable();
            $table->string('applicant_three_members', 50)->nullable();
            $table->tinyInteger('applicant_three_non_profit')->nullable();
            $table->tinyInteger('applicant_three_partnership')->nullable();
            $table->tinyInteger('applicant_three_sub_chapter')->nullable();
            $table->tinyInteger('applicant_three_trust')->nullable();
            $table->tinyInteger('applicant_three_other')->nullable();

            $table->string('contact_info_type_one', 50)->nullable();
            $table->string('contact_info_name_one', 50)->nullable();
            $table->string('contact_info_pp_type_one', 50)->nullable();
            $table->string('contact_info_pp_number_one', 50)->nullable();
            $table->string('contact_info_sp_type_one', 50)->nullable();
            $table->string('contact_info_sp_number_one', 50)->nullable();
            $table->string('contact_info_s_email_one', 50)->nullable();
            $table->string('contact_info_p_email_one', 50)->nullable();

            $table->string('contact_info_type_two', 50)->nullable();
            $table->string('contact_info_name_two', 50)->nullable();
            $table->string('contact_info_pp_type_two', 50)->nullable();
            $table->string('contact_info_pp_number_two', 50)->nullable();
            $table->string('contact_info_sp_type_two', 50)->nullable();
            $table->string('contact_info_sp_number_two', 50)->nullable();
            $table->string('contact_info_s_email_two', 50)->nullable();
            $table->string('contact_info_p_email_two', 50)->nullable();

            $table->string('premises_street_one', 50)->nullable();
            $table->string('premises_city_one', 50)->nullable();
            $table->string('premises_state_one', 50)->nullable();
            $table->string('premises_zipcode_one', 50)->nullable();
            $table->string('premises_country_one', 50)->nullable();
            $table->string('premises_city_limit_one', 50)->nullable();
            $table->string('premises_interest_one', 50)->nullable();
            $table->string('premises_full_employee_one', 50)->nullable();
            $table->string('premises_annual_revenue_one', 50)->nullable();
            $table->string('premises_occupied_area_one', 50)->nullable();
            $table->string('premises_part_employee_one', 50)->nullable();
            $table->string('premises_public_area_one', 50)->nullable();
            $table->string('premises_building_area_one', 50)->nullable();
            $table->tinyInteger('premises_leased_one')->nullable();
            $table->text('premises_description_one')->nullable();

            $table->string('premises_street_two', 50)->nullable();
            $table->string('premises_city_two', 50)->nullable();
            $table->string('premises_state_two', 50)->nullable();
            $table->string('premises_zipcode_two', 50)->nullable();
            $table->string('premises_country_two', 50)->nullable();
            $table->string('premises_city_limit_two', 50)->nullable();
            $table->string('premises_interest_two', 50)->nullable();
            $table->string('premises_full_employee_two', 50)->nullable();
            $table->string('premises_annual_revenue_two', 50)->nullable();
            $table->string('premises_occupied_area_two', 50)->nullable();
            $table->string('premises_part_employee_two', 50)->nullable();
            $table->string('premises_public_area_two', 50)->nullable();
            $table->string('premises_building_area_two', 50)->nullable();
            $table->tinyInteger('premises_leased_two')->nullable();
            $table->text('premises_description_two')->nullable();

            $table->string('premises_street_three', 50)->nullable();
            $table->string('premises_city_three', 50)->nullable();
            $table->string('premises_state_three', 50)->nullable();
            $table->string('premises_zipcode_three', 50)->nullable();
            $table->string('premises_country_three', 50)->nullable();
            $table->string('premises_city_limit_three', 50)->nullable();
            $table->string('premises_interest_three', 50)->nullable();
            $table->string('premises_full_employee_three', 50)->nullable();
            $table->string('premises_annual_revenue_three', 50)->nullable();
            $table->string('premises_occupied_area_three', 50)->nullable();
            $table->string('premises_part_employee_three', 50)->nullable();
            $table->string('premises_public_area_three', 50)->nullable();
            $table->string('premises_building_area_three', 50)->nullable();
            $table->tinyInteger('premises_leased_three')->nullable();
            $table->text('premises_description_three')->nullable();

            $table->string('premises_street_four', 50)->nullable();
            $table->string('premises_city_four', 50)->nullable();
            $table->string('premises_state_four', 50)->nullable();
            $table->string('premises_zipcode_four', 50)->nullable();
            $table->string('premises_country_four', 50)->nullable();
            $table->string('premises_city_limit_four', 50)->nullable();
            $table->string('premises_interest_four', 50)->nullable();
            $table->string('premises_full_employee_four', 50)->nullable();
            $table->string('premises_annual_revenue_four', 50)->nullable();
            $table->string('premises_occupied_area_four', 50)->nullable();
            $table->string('premises_part_employee_four', 50)->nullable();
            $table->string('premises_public_area_four', 50)->nullable();
            $table->string('premises_building_area_four', 50)->nullable();
            $table->tinyInteger('premises_leased_four')->nullable();
            $table->text('premises_description_four')->nullable();

            $table->tinyInteger('nature_apartment')->nullable();
            $table->tinyInteger('nature_condom')->nullable();
            $table->tinyInteger('nature_contractor')->nullable();
            $table->tinyInteger('nature_institutional')->nullable();
            $table->tinyInteger('nature_manufacture')->nullable();
            $table->tinyInteger('nature_office')->nullable();
            $table->tinyInteger('nature_restaurant')->nullable();
            $table->tinyInteger('nature_retail')->nullable();
            $table->tinyInteger('nature_service')->nullable();
            $table->tinyInteger('nature_wholesale')->nullable();
            $table->tinyInteger('nature_start_date')->nullable();
            $table->text('nature_description')->nullable();
            $table->string('nature_total_sale', 50)->nullable();
            $table->string('nature_installation', 50)->nullable();
            $table->string('nature_off_premises', 50)->nullable();
            $table->text('nature_description_operation')->nullable();

            $table->tinyInteger('interest_additional')->nullable();
            $table->tinyInteger('interest_breach')->nullable();
            $table->tinyInteger('interest_co_owner')->nullable();
            $table->tinyInteger('interest_lessor')->nullable();
            $table->tinyInteger('interest_leaseback')->nullable();
            $table->tinyInteger('interest_loss')->nullable();
            $table->tinyInteger('interest_holder')->nullable();
            $table->tinyInteger('interest_loss_payee')->nullable();
            $table->tinyInteger('interest_mortgagee')->nullable();
            $table->tinyInteger('interest_owner')->nullable();
            $table->tinyInteger('interest_registrant')->nullable();
            $table->tinyInteger('interest_trustee')->nullable();
            $table->string('interest_other',50)->nullable();

            $table->string('interest_type', 50)->nullable();
            $table->string('interest_name', 50)->nullable();
            $table->string('interest_address', 50)->nullable();
            $table->string('interest_rank', 50)->nullable();
            $table->string('interest_reference', 50)->nullable();
            $table->string('interest_end_date', 50)->nullable();
            $table->string('interest_line_amount', 50)->nullable();
            $table->string('interest_phone', 50)->nullable();
            $table->string('interest_fax', 50)->nullable();
            $table->string('interest_email', 50)->nullable();
            $table->string('interest_reason', 50)->nullable();

            $table->string('interest_location', 50)->nullable();
            $table->string('interest_building', 50)->nullable();
            $table->string('interest_vehicle', 50)->nullable();
            $table->string('interest_boat', 50)->nullable();
            $table->string('interest_airport', 50)->nullable();
            $table->string('interest_aircraft', 50)->nullable();
            $table->string('interest_item_class', 50)->nullable();
            $table->string('interest_item', 50)->nullable();
            $table->text('interest_item_description')->nullable();

            $table->string('information_q_one_a_name', 50)->nullable();
            $table->string('information_q_one_a_relation', 50)->nullable();
            $table->string('information_q_one_a_percentage', 50)->nullable();

            $table->string('information_q_one_b_name', 50)->nullable();
            $table->string('information_q_one_b_relation', 50)->nullable();
            $table->string('information_q_one_b_percentage', 50)->nullable();

            $table->tinyInteger('information_q_two_manual')->nullable();
            $table->tinyInteger('information_q_two_position')->nullable();
            $table->tinyInteger('information_q_two_meeting')->nullable();
            $table->tinyInteger('information_q_two_osha')->nullable();
            $table->tinyInteger('information_q_two_other')->nullable();

            $table->text('information_q_three')->nullable();

            $table->tinyInteger('information_q_business_one')->nullable();
            $table->tinyInteger('information_q_policy_one')->nullable();
            $table->tinyInteger('information_q_business_two')->nullable();
            $table->tinyInteger('information_q_policy_two')->nullable();
            $table->tinyInteger('information_q_business_three')->nullable();
            $table->tinyInteger('information_q_policy_three')->nullable();
            $table->tinyInteger('information_q_business_four')->nullable();
            $table->tinyInteger('information_q_policy_four')->nullable();

            $table->tinyInteger('information_q_non_payment')->nullable();
            $table->tinyInteger('information_q_non_renewal')->nullable();
            $table->tinyInteger('information_q_agent_carrier')->nullable();
            $table->tinyInteger('information_q_under_writing')->nullable();
            $table->tinyInteger('information_q_condition')->nullable();
            $table->text('information_q_condition_description')->nullable();
            $table->tinyInteger('information_q_other')->nullable();

            $table->text('information_q_six')->nullable();
            $table->text('information_q_seven')->nullable();

            $table->string('information_q_eight_date_one',50)->nullable();
            $table->text('information_q_eight_explanation_one')->nullable();
            $table->text('information_q_eight_resolution_one')->nullable();
            $table->text('information_q_eight_resolution_date_one')->nullable();

            $table->string('information_q_eight_date_two',50)->nullable();
            $table->text('information_q_eight_explanation_two')->nullable();
            $table->text('information_q_eight_resolution_two')->nullable();
            $table->text('information_q_eight_resolution_date_two')->nullable();

            $table->string('information_q_nine_date_one',50)->nullable();
            $table->text('information_q_nine_explanation_one')->nullable();
            $table->text('information_q_nine_resolution_one')->nullable();
            $table->text('information_q_nine_resolution_date_one')->nullable();

            $table->string('information_q_nine_date_two',50)->nullable();
            $table->text('information_q_nine_explanation_two')->nullable();
            $table->text('information_q_nine_resolution_two')->nullable();
            $table->text('information_q_nine_resolution_date_two')->nullable();

            $table->string('information_q_ten_date_one',50)->nullable();
            $table->text('information_q_ten_explanation_one')->nullable();
            $table->text('information_q_ten_resolution_one')->nullable();
            $table->text('information_q_ten_resolution_date_one')->nullable();

            $table->string('information_q_ten_date_two',50)->nullable();
            $table->text('information_q_ten_explanation_two')->nullable();
            $table->text('information_q_ten_resolution_two')->nullable();
            $table->text('information_q_ten_resolution_date_two')->nullable();

            $table->string('information_q_eleven',1)->nullable();
            $table->string('information_q_eleven_name',50)->nullable();
            $table->string('information_q_twelve',1)->nullable();

            $table->string('information_q_thirteen',1)->nullable();
            $table->text('information_q_thirteen_detail')->nullable();

            $table->string('information_q_fourteen',1)->nullable();
            $table->text('information_q_fourteen_detail')->nullable();

            $table->string('information_q_fifteen',1)->nullable();
            $table->text('information_q_fifteen_detail')->nullable();

            $table->text('remarks')->nullable();

            $table->string('carrier_one_year',50)->nullable();

            $table->string('carrier_one_gl',50)->nullable();
            $table->string('carrier_one_auto',50)->nullable();
            $table->string('carrier_one_property',50)->nullable();
            $table->string('carrier_one_other',50)->nullable();

            $table->string('carrier_policy_one_gl',50)->nullable();
            $table->string('carrier_policy_one_auto',50)->nullable();
            $table->string('carrier_policy_one_property',50)->nullable();
            $table->string('carrier_policy_one_other',50)->nullable();

            $table->string('carrier_premium_one_gl',50)->nullable();
            $table->string('carrier_premium_one_auto',50)->nullable();
            $table->string('carrier_premium_one_property',50)->nullable();
            $table->string('carrier_premium_one_other',50)->nullable();

            $table->string('carrier_effective_one_gl',50)->nullable();
            $table->string('carrier_effective_one_auto',50)->nullable();
            $table->string('carrier_effective_one_property',50)->nullable();
            $table->string('carrier_effective_one_other',50)->nullable();

            $table->string('carrier_expiration_one_gl',50)->nullable();
            $table->string('carrier_expiration_one_auto',50)->nullable();
            $table->string('carrier_expiration_one_property',50)->nullable();
            $table->string('carrier_expiration_one_other',50)->nullable();


            $table->string('carrier_two_year',50)->nullable();

            $table->string('carrier_two_gl',50)->nullable();
            $table->string('carrier_two_auto',50)->nullable();
            $table->string('carrier_two_property',50)->nullable();
            $table->string('carrier_two_other',50)->nullable();

            $table->string('carrier_policy_two_gl',50)->nullable();
            $table->string('carrier_policy_two_auto',50)->nullable();
            $table->string('carrier_policy_two_property',50)->nullable();
            $table->string('carrier_policy_two_other',50)->nullable();

            $table->string('carrier_premium_two_gl',50)->nullable();
            $table->string('carrier_premium_two_auto',50)->nullable();
            $table->string('carrier_premium_two_property',50)->nullable();
            $table->string('carrier_premium_two_other',50)->nullable();

            $table->string('carrier_effective_two_gl',50)->nullable();
            $table->string('carrier_effective_two_auto',50)->nullable();
            $table->string('carrier_effective_two_property',50)->nullable();
            $table->string('carrier_effective_two_other',50)->nullable();

            $table->string('carrier_expiration_two_gl',50)->nullable();
            $table->string('carrier_expiration_two_auto',50)->nullable();
            $table->string('carrier_expiration_two_property',50)->nullable();
            $table->string('carrier_expiration_two_other',50)->nullable();

            $table->string('carrier_three_year',50)->nullable();

            $table->string('carrier_three_gl',50)->nullable();
            $table->string('carrier_three_auto',50)->nullable();
            $table->string('carrier_three_property',50)->nullable();
            $table->string('carrier_three_other',50)->nullable();

            $table->string('carrier_policy_three_gl',50)->nullable();
            $table->string('carrier_policy_three_auto',50)->nullable();
            $table->string('carrier_policy_three_property',50)->nullable();
            $table->string('carrier_policy_three_other',50)->nullable();

            $table->string('carrier_premium_three_gl',50)->nullable();
            $table->string('carrier_premium_three_auto',50)->nullable();
            $table->string('carrier_premium_three_property',50)->nullable();
            $table->string('carrier_premium_three_other',50)->nullable();

            $table->string('carrier_effective_three_gl',50)->nullable();
            $table->string('carrier_effective_three_auto',50)->nullable();
            $table->string('carrier_effective_three_property',50)->nullable();
            $table->string('carrier_effective_three_other',50)->nullable();

            $table->string('carrier_expiration_three_gl',50)->nullable();
            $table->string('carrier_expiration_three_auto',50)->nullable();
            $table->string('carrier_expiration_three_property',50)->nullable();
            $table->string('carrier_expiration_three_other',50)->nullable();

            $table->string('loss_year',50)->nullable();
            $table->string('loss_amount',50)->nullable();

            $table->string('loss_one_date',50)->nullable();
            $table->string('loss_one_line',50)->nullable();
            $table->text('loss_one_description')->nullable();
            $table->string('loss_one_claim_date',50)->nullable();
            $table->string('loss_one_amount_paid',50)->nullable();
            $table->string('loss_one_amount_reserved',50)->nullable();
            $table->tinyInteger('loss_one_subrogation')->nullable();
            $table->tinyInteger('loss_one_claim_open')->nullable();

            $table->string('loss_two_date',50)->nullable();
            $table->string('loss_two_line',50)->nullable();
            $table->text('loss_two_description')->nullable();
            $table->string('loss_two_claim_date',50)->nullable();
            $table->string('loss_two_amount_paid',50)->nullable();
            $table->string('loss_two_amount_reserved',50)->nullable();
            $table->tinyInteger('loss_two_subrogation')->nullable();
            $table->tinyInteger('loss_two_claim_open')->nullable();

            $table->string('loss_three_date',50)->nullable();
            $table->string('loss_three_line',50)->nullable();
            $table->text('loss_three_description')->nullable();
            $table->string('loss_three_claim_date',50)->nullable();
            $table->string('loss_three_amount_paid',50)->nullable();
            $table->string('loss_three_amount_reserved',50)->nullable();
            $table->tinyInteger('loss_three_subrogation')->nullable();
            $table->tinyInteger('loss_three_claim_open')->nullable();

            $table->tinyInteger('signature_notice')->nullable();
            $table->string('applicant',50)->nullable();
            $table->string('procedure_signature',50)->nullable();
            $table->string('procedure_name',50)->nullable();
            $table->string('procedure_license',50)->nullable();
            $table->string('applicant_signature',50)->nullable();
            $table->string('applicant_date',50)->nullable();
            $table->string('procedure_no',50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_applications');
    }
};
