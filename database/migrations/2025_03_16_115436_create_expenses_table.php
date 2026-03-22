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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('tripID');
            $table->string('unit');
            $table->decimal('amount', 10, 2); // to store the amount with 2 decimal places
            $table->timestamps(); // Automatically creates created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
