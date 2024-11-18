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
        Schema::create('primary_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique(); // Language name
            $table->string('code', 10)->unique(); // ISO language code
            $table->timestamps(); // Created and Updated at timestamps
            $table->softDeletes(); // Created and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_languages');
    }
};
