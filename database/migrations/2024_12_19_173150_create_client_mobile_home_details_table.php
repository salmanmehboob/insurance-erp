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
        Schema::create('client_mobile_home_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('value');
            $table->string('liability_limit');
            $table->string('contents');
            $table->string('flood');
            $table->string('theft');
            $table->string('deductible');
            $table->string('adjacent_structure');
            $table->string('replacement_cost');

            $table->string('make');
            $table->string('model');
             $table->string('built_year');
            $table->string('dimensions');
            $table->string('tied_down');
            $table->string('type_of_siding');

            $table->boolean('park_name');
            $table->boolean('skirted');
            $table->boolean('fire_place');
            $table->boolean('is_inside_city_limit');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_mobile_home_details');
    }
};
