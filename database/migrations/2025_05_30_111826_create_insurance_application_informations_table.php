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
        Schema::create('insurance_application_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('insurance_applications')->onDelete('cascade');

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

            $table->string('information_q_business_one')->nullable();
            $table->string('information_q_policy_one')->nullable();
            $table->string('information_q_business_two')->nullable();
            $table->string('information_q_policy_two')->nullable();
            $table->string('information_q_business_three')->nullable();
            $table->string('information_q_policy_three')->nullable();
            $table->string('information_q_business_four')->nullable();
            $table->string('information_q_policy_four')->nullable();

            $table->tinyInteger('information_q_non_payment')->nullable();
            $table->tinyInteger('information_q_non_renewal')->nullable();
            $table->tinyInteger('information_q_agent_carrier')->nullable();
            $table->tinyInteger('information_q_under_writing')->nullable();
            $table->tinyInteger('information_q_condition')->nullable();
            $table->text('information_q_condition_description')->nullable();
            $table->tinyInteger('information_q_other')->nullable();

            $table->text('information_q_six')->nullable();
            $table->text('information_q_seven')->nullable();

            $table->string('information_q_eight_date_one', 50)->nullable();
            $table->text('information_q_eight_explanation_one')->nullable();
            $table->text('information_q_eight_resolution_one')->nullable();
            $table->text('information_q_eight_resolution_date_one')->nullable();

            $table->string('information_q_eight_date_two', 50)->nullable();
            $table->text('information_q_eight_explanation_two')->nullable();
            $table->text('information_q_eight_resolution_two')->nullable();
            $table->text('information_q_eight_resolution_date_two')->nullable();

            $table->string('information_q_nine_date_one', 50)->nullable();
            $table->text('information_q_nine_explanation_one')->nullable();
            $table->text('information_q_nine_resolution_one')->nullable();
            $table->text('information_q_nine_resolution_date_one')->nullable();

            $table->string('information_q_nine_date_two', 50)->nullable();
            $table->text('information_q_nine_explanation_two')->nullable();
            $table->text('information_q_nine_resolution_two')->nullable();
            $table->text('information_q_nine_resolution_date_two')->nullable();

            $table->string('information_q_ten_date_one', 50)->nullable();
            $table->text('information_q_ten_explanation_one')->nullable();
            $table->text('information_q_ten_resolution_one')->nullable();
            $table->text('information_q_ten_resolution_date_one')->nullable();

            $table->string('information_q_ten_date_two', 50)->nullable();
            $table->text('information_q_ten_explanation_two')->nullable();
            $table->text('information_q_ten_resolution_two')->nullable();
            $table->text('information_q_ten_resolution_date_two')->nullable();

            $table->tinyInteger('information_q_eleven')->nullable();
            $table->string('information_q_eleven_name', 50)->nullable();
            $table->tinyInteger('information_q_twelve')->nullable();

            $table->tinyInteger('information_q_thirteen')->nullable();
            $table->text('information_q_thirteen_detail')->nullable();

            $table->tinyInteger('information_q_fourteen')->nullable();
            $table->text('information_q_fourteen_detail')->nullable();

            $table->tinyInteger('information_q_fifteen')->nullable();
            $table->text('information_q_fifteen_detail')->nullable();

            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_application_informations');
    }
};
