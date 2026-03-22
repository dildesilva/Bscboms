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
        Schema::table('boats', function (Blueprint $table) {
            // $table->unsignedBigInteger('boatId')->nullable()->unique();

            // $table->unsignedBigInteger('boatId')->unique(); // Ensure it matches users.id
            // $table->foreign('boatId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boats', function (Blueprint $table) {
            $table->dropForeign(['boatId']);
            $table->dropColumn('boatId');
        });
    }
};
