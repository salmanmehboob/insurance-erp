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
        Schema::create('agency_commissions', function (Blueprint $table) {
                $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('policy_number');
            $table->date('date');
            $table->string('transaction');
            $table->string('pro_premium');
            $table->string('commission');
            $table->string('paid');
            $table->string('due');
            $table->text('notes');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_commissions');
    }
};
