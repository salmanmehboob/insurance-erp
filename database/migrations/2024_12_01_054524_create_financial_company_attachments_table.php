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
        Schema::create('financial_company_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financial_company_id')->index(); // Reference to Insurance Companies
            $table->string('attachment_name');
            $table->string('path'); // Path to the stored file
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('financial_company_id')->references('id')->on('financial_companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_company_attachments');
    }
};
