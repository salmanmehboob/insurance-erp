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
        Schema::create('client_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('policy_status_id');
            $table->unsignedBigInteger('term_id');
            $table->date('effective_date');
            $table->date('expiration_date');
            $table->date('sold_date');
            $table->string('file_number');
            $table->string('policy_number');
            $table->unsignedBigInteger('insurance_company_id');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('agency_id');

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('policy_status_id')->references('id')->on('policy_statuses')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_policies');
    }
};
