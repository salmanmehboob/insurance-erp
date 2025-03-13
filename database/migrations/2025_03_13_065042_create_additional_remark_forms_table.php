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
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
            $table->foreignId('insurance_company_id')->constrained('insurance_companies')->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('form_no')->unique();
            $table->string('form_title');
            $table->string('loc');
            $table->string('naic_code');
            $table->string('agency_customer_id');
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
