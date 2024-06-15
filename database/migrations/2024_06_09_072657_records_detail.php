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
        Schema::create('recordsDetail', function(Blueprint $table){
            $table->id('records_id');
            $table->foreignId('patient_id')->constrained('patient', 'patient_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('natrium');
            $table->integer('kalium');
            $table->integer('klorida');
            $table->integer('kalsium');
            $table->integer('magnesium');
            $table->integer('fosfat');
            $table->integer('bikarbonat');
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
