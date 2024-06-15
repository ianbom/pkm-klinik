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
        Schema::create('doctor', function(Blueprint $table){
            $table->id('doctor_id');
            $table->foreignId('hospital_id')->constrained('hospital', 'hospital_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('poliklinik_id')->constrained('poliklinik', "poliklinik_id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name_doctor');
            $table->boolean('gender');
            $table->string('nip_doctor');
            $table->string('address');
            $table->string('no_phone');
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
