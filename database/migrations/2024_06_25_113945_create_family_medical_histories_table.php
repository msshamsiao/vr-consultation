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
        Schema::create('family_medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->boolean('is_heart_disease_father')->nullable(); 
            $table->boolean('is_heart_disease_mother')->nullable();
            $table->boolean('is_diabetes_father')->nullable();
            $table->boolean('is_diabetes_mother')->nullable(); 
            $table->boolean('is_cancer_father')->nullable();
            $table->boolean('is_cancer_mother')->nullable(); 
            $table->boolean('is_hypertension_father')->nullable(); 
            $table->boolean('is_hypertension_mother')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_medical_histories');
    }
};
