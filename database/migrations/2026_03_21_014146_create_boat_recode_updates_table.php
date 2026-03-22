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
        Schema::create('boat_recode_updates', function (Blueprint $table) {
            $table->id();
             // ── Engine Data
              $table->string('boatId');
            $table->decimal('engineageyears', 5, 1)->nullable();
            $table->unsignedInteger('totalenginehours')->nullable();
            $table->decimal('avgdailyoperatinghours', 5, 1)->nullable();
            $table->unsignedInteger('dayssincelastmaintenance')->nullable();
            $table->decimal('hourssincelastservice', 8, 1)->nullable();
            $table->decimal('enginetempc', 5, 1)->nullable();
            $table->decimal('oilpressurebar', 5, 2)->nullable();
            $table->unsignedTinyInteger('coolantlevelpercent')->nullable();
            $table->unsignedInteger('enginerpm')->nullable();
            $table->decimal('fuelconsumptionlph', 6, 1)->nullable();
            $table->unsignedTinyInteger('vibrationlevel')->nullable();
            $table->unsignedInteger('oilchangedaysago')->nullable();
            $table->unsignedInteger('filterchangedaysago')->nullable();
            $table->unsignedInteger('lastinspectiondays')->nullable();
            $table->unsignedTinyInteger('seacondition')->nullable();

            // ── Condition
            $table->string('hullcondition')->nullable();
            $table->string('unusualsounds')->nullable();
            $table->string('conditionseverity')->nullable();

    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boat_recode_updates');
    }
};
