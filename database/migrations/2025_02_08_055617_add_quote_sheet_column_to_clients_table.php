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
        Schema::table('clients', static function (Blueprint $table) {
            $table->date('quote_date')->nullable();
            $table->string('current_carrier')->nullable();
            $table->date('current_carrier_expiration')->nullable();
            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('purchase_price')->nullable();
            $table->date('date_cov_needed')->nullable();
            $table->string('city_limit')->nullable();
            $table->string('stories')->nullable();
            $table->string('heating')->nullable();
            $table->string('wiring')->nullable();
            $table->string('plumbing')->nullable();
            $table->text('loss_history')->nullable();
            $table->text('any_business_on_premises')->nullable();
            $table->text('swimming_pool_tubs')->nullable();
            $table->text('trampoline')->nullable();
            $table->text('animal_on_premises')->nullable();
            $table->string('coverage_type')->nullable();
            $table->string('dba')->nullable();
            $table->string('corp_if_any')->nullable();
            $table->string('type_of_insurance')->nullable();
            $table->string('structure')->nullable();
            $table->string('no_of_employee')->nullable();
            $table->string('estimated_annually_payroll')->nullable();
            $table->string('estimated_annually_receipts')->nullable();
            $table->string('workers_compensation')->nullable();
            $table->string('no_of_additional_insured')->nullable();
            $table->string('waiver_of_subrogation')->nullable();

            $table->string('coverage_request')->nullable();
            $table->string('prior_coverage')->nullable();
            $table->date('coverage_expiration')->nullable();
            $table->string('claim_amount')->nullable();
            $table->string('owner')->nullable();
            $table->string('tenant')->nullable();
            $table->tinyInteger('is_any_pet')->nullable();
            $table->string('bankruptcy')->nullable();
            $table->string('company')->nullable();

            $table->text('business_description')->nullable();
            $table->text('use_each_vehicle')->nullable();
            $table->string('radius_operation')->nullable();
            $table->string('states_driven')->nullable();
            $table->string('owner_operated_for_hire')->nullable();
            $table->string('contract_name')->nullable();
            $table->tinyInteger('common_coverage')->nullable();
            $table->date('common_coverage_effective_date')->nullable();
            $table->date('common_coverage_expiry_date')->nullable();
            $table->string('coverage_needed')->nullable();
            $table->string('liability_limit_needed')->nullable();
            $table->string('uim')->nullable();
            $table->string('pip')->nullable();

            $table->string('is_cargo_needed_insured')->nullable();
            $table->text('cargo_needed_insured_detail')->nullable();
            $table->tinyInteger('is_truck_overnight')->nullable();
            $table->tinyInteger('is_trailer_lock')->nullable();
            $table->tinyInteger('is_alarm_system')->nullable();

            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
};
