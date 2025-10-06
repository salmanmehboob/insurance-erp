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
        Schema::create('cia_other_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commerical_appId')->constrained('commercial_insurance_applications')->onDelete('cascade');
            $table->text('remarksInstruction')->nullable();
            $table->text('priorCI_r1_year')->nullable();
            $table->text('priorCI_r1_gl')->nullable();
            $table->text('priorCI_r1_autmob')->nullable();
            $table->text('priorCI_r1_property')->nullable();
            $table->text('priorCI_r1_other')->nullable();
            $table->text('priorCI_r1_pgl')->nullable();
            $table->text('priorCI_r1_pautomob')->nullable();
            $table->text('priorCI_r1_pproperty')->nullable();
            $table->text('priorCI_r1_pother')->nullable();
            $table->text('priorCI_r1_pRgl')->nullable();
            $table->text('priorCI_r1_pRautomob')->nullable();
            $table->text('priorCI_r1_pRproperty')->nullable();
            $table->text('priorCI_r1_pRother')->nullable();
            $table->text('priorCI_r1_egl')->nullable();
            $table->text('priorCI_r1_eautomob')->nullable();
            $table->text('priorCI_r1_eproperty')->nullable();
            $table->text('priorCI_r1_eother')->nullable();
            $table->text('priorCI_r1_exgl')->nullable();
            $table->text('priorCI_r1_exautomob')->nullable();
            $table->text('priorCI_r1_exproperty')->nullable();
            $table->text('priorCI_r1_exother')->nullable();
            $table->text('priorCI_r2_year')->nullable();
            $table->text('priorCI_r2_gl')->nullable();
            $table->text('priorCI_r2_autmob')->nullable();
            $table->text('priorCI_r2_property')->nullable();
            $table->text('priorCI_r2_other')->nullable();
            $table->text('priorCI_r2_pgl')->nullable();
            $table->text('priorCI_r2_pautomob')->nullable();
            $table->text('priorCI_r2_pproperty')->nullable();
            $table->text('priorCI_r2_pother')->nullable();
            $table->text('priorCI_r2_pRgl')->nullable();
            $table->text('priorCI_r2_pRautomob')->nullable();
            $table->text('priorCI_r2_pRproperty')->nullable();
            $table->text('priorCI_r2_pRother')->nullable();
            $table->text('priorCI_r2_egl')->nullable();
            $table->text('priorCI_r2_eautomob')->nullable();
            $table->text('priorCI_r2_eproperty')->nullable();
            $table->text('priorCI_r2_eother')->nullable();
            $table->text('priorCI_r2_exgl')->nullable();
            $table->text('priorCI_r2_exautomob')->nullable();
            $table->text('priorCI_r2_exproperty')->nullable();
            $table->text('priorCI_r2_exother')->nullable();
            $table->text('priorCI_r3_year')->nullable();
            $table->text('priorCI_r3_gl')->nullable();
            $table->text('priorCI_r3_autmob')->nullable();
            $table->text('priorCI_r3_property')->nullable();
            $table->text('priorCI_r3_other')->nullable();
            $table->text('priorCI_r3_pgl')->nullable();
            $table->text('priorCI_r3_pautomob')->nullable();
            $table->text('priorCI_r3_pproperty')->nullable();
            $table->text('priorCI_r3_pother')->nullable();
            $table->text('priorCI_r3_pRgl')->nullable();
            $table->text('priorCI_r3_pRautomob')->nullable();
            $table->text('priorCI_r3_pRproperty')->nullable();
            $table->text('priorCI_r3_pRother')->nullable();
            $table->text('priorCI_r3_egl')->nullable();
            $table->text('priorCI_r3_eautomob')->nullable();
            $table->text('priorCI_r3_eproperty')->nullable();
            $table->text('priorCI_r3_eother')->nullable();
            $table->text('priorCI_r3_exgl')->nullable();
            $table->text('priorCI_r3_exautomob')->nullable();
            $table->text('priorCI_r3_exproperty')->nullable();
            $table->text('priorCI_r3_exother')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cia_other_info');
    }
};
