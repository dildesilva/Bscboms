<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trip_member_Detiles', function (Blueprint $table) {
            $table->id();
            $table->string('userEmailId');
            $table->string('name');
            $table->string('nic')->unique();
            $table->string('employer_number')->unique();
            $table->date('dob');
            $table->string('country');
            $table->string('gender');
            $table->string('rank');
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trip_member_details');
    }
};

