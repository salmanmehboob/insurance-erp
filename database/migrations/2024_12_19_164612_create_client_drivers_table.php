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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('ssn_no')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('marital_status_id')->nullable();
            $table->unsignedBigInteger('relationship_id')->nullable();

            $table->string('license_no')->nullable();
            $table->unsignedBigInteger('us_state_id')->nullable();
            $table->string('license_year')->nullable();
            $table->string('cell_no')->nullable();
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->string('occupation')->nullable();
            $table->string('industry')->nullable();

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
