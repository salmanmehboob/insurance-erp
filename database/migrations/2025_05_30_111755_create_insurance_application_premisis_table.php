<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('insurance_application_premises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('insurance_applications')->onDelete('cascade');

            $table->string('premises_loc_one', 50)->nullable();
            $table->string('premises_bld_one', 50)->nullable();
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

            $table->string('premises_loc_two', 50)->nullable();
            $table->string('premises_bld_two', 50)->nullable();
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

            $table->string('premises_loc_three', 50)->nullable();
            $table->string('premises_bld_three', 50)->nullable();
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

            $table->string('premises_loc_four', 50)->nullable();
            $table->string('premises_bld_four', 50)->nullable();
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
            $table->string('nature_start_date')->nullable();
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
            $table->string('interest_other', 50)->nullable();

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

            $table->string('interest_location', 50)->nullable();
            $table->string('interest_building', 50)->nullable();
            $table->string('interest_vehicle', 50)->nullable();
            $table->string('interest_boat', 50)->nullable();
            $table->string('interest_airport', 50)->nullable();
            $table->string('interest_aircraft', 50)->nullable();
            $table->string('interest_item_class', 50)->nullable();
            $table->string('interest_item', 50)->nullable();
            $table->text('interest_item_description')->nullable();
            $table->text('interest_reason')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_application_premisis');
    }
};
