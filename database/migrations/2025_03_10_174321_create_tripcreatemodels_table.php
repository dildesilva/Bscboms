<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tripcreatemodels', function (Blueprint $table) {
            $table->id();
            $table->string('departureLocation');
            $table->string('boat')->nullable();
            $table->string('boaTemail')->nullable();
            $table->string('status')->default('Scheduled');
            $table->string('emergency')->default('Safe');
            $table->dateTime('departureTime');
            $table->dateTime('plannedArrivalTime');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tripcreatemodels');
    }
};
