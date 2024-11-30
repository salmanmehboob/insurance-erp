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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id'); // Foreign key to US states
            $table->string('address')->nullable();
            $table->string('city');
            $table->unsignedBigInteger('state_id'); // Foreign key to US states
            $table->string('zip_code');
            $table->string('phone_no');
            $table->string('email')->unique();
            $table->unsignedBigInteger('bank_id');
            $table->decimal('commission_in_percentage', 5, 2)->default(0);
            $table->decimal('commission_fee', 10, 2)->default(0);
            $table->text('note');
            $table->timestamps();
            $table->softDeletes(); // Soft delete timestamp
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('us_states')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('bank_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
