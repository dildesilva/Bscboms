<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->id();

            // ── Boat Information
            $table->string('boatName');
            $table->string('boatId');
            $table->string('registrationNumber')->unique();
            $table->string('hullId')->unique();
            $table->year('year');
            $table->decimal('length', 5, 2);
            $table->integer('maxCrew');
            $table->string('boattype')->nullable();
            $table->string('enginemodel')->nullable();
            $table->string('engineType');
            $table->decimal('enginePower', 6, 2);
            // $table->string('fishingMethod');

        
            // ── Foreign Key
            $table->foreign('boatId')->references('email')->on('users')->onDelete('cascade');

            $table->timestamps();

            // Ensure matching data type for the foreign key
        });
    }

    public function down()
    {
        Schema::dropIfExists('boats');
    }
};

