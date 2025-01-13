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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('insurance_company_id');
            $table->string('policy_number');
            $table->date('payment_date');
            $table->string('payment_for');
            $table->string('payment_method');
            $table->string('amount');
            $table->string('agency_fee');
            $table->string('total');
            $table->string('paid');
            $table->string('balance');
            $table->unsignedBigInteger('received_by');
            $table->unsignedBigInteger('received_at');
            $table->tinyInteger('check_to_finance');
            $table->tinyInteger('payment_send_to_insurance_company');
            $table->text('notes');
            $table->unsignedBigInteger('payment_bank_id');
            $table->date('next_payment');


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('received_by')->references('id')->on('agents')->onDelete('cascade');
            $table->foreign('received_at')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('payment_bank_id')->references('id')->on('payment_banks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
