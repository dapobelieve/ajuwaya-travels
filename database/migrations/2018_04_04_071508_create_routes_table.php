<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->integer('camp_id')->unsigned();
            $table->mediumText('take_off');
            $table->string('price', 7);
            $table->enum('bus_type', [15, 35]);
            $table->dateTime('takeoff');
            $table->softDeletes();
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
        Schema::dropIfExists('routes');
    }
}
