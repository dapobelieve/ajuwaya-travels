<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('route_id')->unsigned();
            $table->string('name', 100);
            $table->string('email');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('phone', 11);
            $table->json('seat');
            $table->string('bk_ref');
            $table->integer('seat_num');
            $table->enum('pay_status', [0, 1]);
            $table->string('amount', 7);
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('route_id')->refrences('id')->on('routes');
            // $table->foreign('user_id')->refrences('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
