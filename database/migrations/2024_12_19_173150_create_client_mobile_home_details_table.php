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
            $table->string('value')->nullable();
            $table->string('liability_limit')->nullable();
            $table->string('contents')->nullable();
            $table->string('flood')->nullable();
            $table->string('theft')->nullable();
            $table->string('deductible')->nullable();
            $table->string('adjacent_structure')->nullable();
            $table->string('replacement_cost')->nullable();

            $table->string('make')->nullable();
            $table->string('model')->nullable();
             $table->string('built_year')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('tied_down')->nullable();
            $table->string('type_of_siding')->nullable();

            $table->string('park_name')->nullable();
            $table->string('skirted')->nullable();
            $table->string('fire_place')->nullable();
            $table->boolean('is_inside_city_limit')->nullable();
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
