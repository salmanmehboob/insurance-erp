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
        Schema::create('general_agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->string('address')->nullable();
            $table->string('city');
            $table->unsignedBigInteger('state_id')->index();
            $table->string('zip_code')->nullable();
            $table->string('phone_no')->nullable();
            $table->text('note')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('website')->nullable();
            $table->string('agency_code')->nullable();
            $table->decimal('commission_in_percentage', 5, 2)->nullable(); // e.g., 5.50%
            $table->timestamps();
            $table->softDeletes();

             $table->foreign('state_id')->references('id')->on('us_states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_agents');
    }
};
