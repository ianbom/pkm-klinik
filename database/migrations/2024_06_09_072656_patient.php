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
        Schema::create('patient', function(Blueprint $table){
            $table->id('patient_id');
            $table->string('name_patient');
            $table->boolean('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->integer('age');
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
