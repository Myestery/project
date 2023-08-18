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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('booking_id')->nullable(); // Assuming a bookings table
            $table->unsignedBigInteger('hotel_id')->nullable(); // Assuming a hotels table
            $table->unsignedBigInteger('room_id'); // Assuming a rooms table
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3);
            $table->string('payment_reference')->unique();
            $table->string('flw_ref')->nullable(); // Flutterwave reference
            $table->string('flw_transaction_id')->nullable(); // Flutterwave transaction ID
            $table->boolean('status')->default(false); // Pending payment
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
