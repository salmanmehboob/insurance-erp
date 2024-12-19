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
        Schema::create('client_drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->integer('age');
            $table->string('ssn_no');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('marital_status_id');
            $table->unsignedBigInteger('relationship_id');

            $table->string('license_no');
            $table->unsignedBigInteger('us_state_id');
            $table->string('license_year');
            $table->string('cell_no');
            $table->unsignedBigInteger('education_level_id');
            $table->string('occupation');
            $table->string('industry');

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses')->onDelete('cascade');
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('cascade');
            $table->foreign('us_state_id')->references('id')->on('us_states')->onDelete('cascade');
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_drivers');
    }
};
