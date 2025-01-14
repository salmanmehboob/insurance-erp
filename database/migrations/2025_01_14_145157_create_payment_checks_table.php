<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_bank_id');
            $table->string('check_no');
            $table->date('payment_date');
            $table->unsignedBigInteger('pay_to');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('insurance_company_id');
            $table->string('policy_number');
            $table->string('amount');
            $table->text('notes');
            $table->string('account');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('pay_to')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('payment_bank_id')->references('id')->on('payment_banks')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_checks');
    }
};
