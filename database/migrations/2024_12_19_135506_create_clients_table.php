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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to US states
            $table->unsignedBigInteger('policy_type_id'); // Foreign key to US states
            $table->string('applicant_name');
            $table->string('address')->nullable();
            $table->string('city');
            $table->unsignedBigInteger('state_id'); // Foreign key to US states
            $table->string('zip_code');
            $table->string('email')->unique();
            $table->string('home_phone_no');
            $table->string('cell_phone_no');
            $table->string('work_phone_no');
            $table->string('fax_phone_no');
            $table->unsignedBigInteger('email_status_id');
             $table->unsignedBigInteger('primary_language_id');
            $table->date('anniversary');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('policy_type_id')->references('id')->on('policy_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('us_states')->onDelete('cascade');
            $table->foreign('email_status_id')->references('id')->on('email_statuses')->onDelete('cascade');
            $table->foreign('primary_language_id')->references('id')->on('primary_languages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
