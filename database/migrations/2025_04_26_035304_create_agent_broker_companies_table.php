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
        Schema::create('agent_broker_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_broker_form_id')->constrained('agent_broker_forms')->onDelete('cascade');
            $table->string('name');
            $table->string('policy_number');
            $table->string('effective_date');
            $table->string('expiration_date');
            $table->string('line_of_business');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_broker_companies');
    }
};
