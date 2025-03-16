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
        Schema::create('evidence_of_property_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
            $table->foreignId('insurance_company_id')->constrained('insurance_companies')->onDelete('cascade');
            $table->string('loan_no')->nullable();
            $table->string('code')->nullable();
            $table->string('sub_code')->nullable();
            $table->string('agency_customer_id')->nullable();
            $table->enum('is_terminated', ['0', '1'])->default('0');
            $table->date('evidence_date')->nullable();
            $table->text('property_description')->nullable();
            $table->enum('is_perils_insured', ['0', '1'])->default('0');
            $table->enum('is_basic', ['0', '1'])->default('0');
            $table->enum('is_broad', ['0', '1'])->default('0');
            $table->enum('is_special', ['0', '1'])->default('0');
            $table->text('coverage_description')->nullable();
            $table->decimal('insurance_amount', 15, 2)->nullable();
            $table->decimal('deductible', 15, 2)->nullable();
            $table->text('remarks')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->enum('is_additional_insured', ['0', '1'])->default('0');
            $table->enum('is_murtagagee', ['0', '1'])->default('0');
            $table->enum('is_lenders_loss_payable', ['0', '1'])->default('0');
            $table->enum('is_loss_payee', ['0', '1'])->default('0');
            $table->string('representative_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence_of_property_forms');
    }
};
