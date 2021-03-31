<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingAdditionalEquipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_additional_equips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->integer('additionalEquip_id')->unsigned();
            $table->foreign('additionalEquip_id')->references('id')->on('additional_equips')->onDelete('cascade');
            
        
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
        Schema::dropIfExists('booking_additional_equips');
    }
}
