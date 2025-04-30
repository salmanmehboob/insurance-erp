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
        Schema::create('additional_remark_forms', function (Blueprint $table) {
            $table->id();
            $table->string('agency_customer_id');
            $table->string('loc');
            $table->string('agency_name');
            $table->string('name_insured');
            $table->string('policy_number');
            $table->string('carrier');
            $table->string('naic_code');
            $table->date('effective_date');
            $table->string('form_no')->unique();
            $table->string('form_title');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_remark_forms');
    }
};
