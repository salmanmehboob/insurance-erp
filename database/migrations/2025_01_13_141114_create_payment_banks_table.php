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
        Schema::create('payment_banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('account_type');
            $table->string('current_balance');
            $table->string('current_check');
            $table->unsignedBigInteger('location');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('location')->references('id')->on('agencies')->onDelete('cascade');

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
