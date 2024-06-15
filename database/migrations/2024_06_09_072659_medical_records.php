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
        Schema::create('medicalRecords', function(Blueprint $table){
            $table->id('medical_id');
            $table->foreignId('doctor_id')->constrained('doctor', 'doctor_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('records_id')->constrained('recordsDetail', 'records_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('total_elektrolit');
            $table->string('diagnosa');
            $table->date('create_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
