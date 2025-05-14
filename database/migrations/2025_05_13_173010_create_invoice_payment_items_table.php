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
        Schema::create('invoice_payment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_payment_id')->constrained('invoice_payments')->onDelete('cascade');
            $table->string('item_name');
            $table->string('amount');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_payment_items');
    }
};
