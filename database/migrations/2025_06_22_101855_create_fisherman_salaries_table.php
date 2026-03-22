<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fisherman_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->string('emp_no');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('slip_code')->unique();
            $table->string('rank');
            $table->text('notes')->nullable();
            $table->text('bonus')->nullable();
            $table->text('month');
            $table->timestamps();

            $table->foreign('user_email')->references('email')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fisherman_salaries');
    }
};
