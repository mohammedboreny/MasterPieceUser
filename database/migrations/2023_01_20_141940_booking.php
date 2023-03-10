<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('Card_id');
            $table->string('Park_id');
            $table->string('user_id');
            $table->date("BookingDate");
            $table->integer('Reservation_Time');
            $table->string('Phone_Number');
            $table->string('payment_amount');
            $table->boolean('discount')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
