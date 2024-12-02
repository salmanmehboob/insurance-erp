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
        Schema::create('insurance_company_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_company_id')->index(); // Reference to Insurance Companies
            $table->string('attachment_name');
            $table->string('path'); // Path to the stored file
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_company_attachments');
    }
};
