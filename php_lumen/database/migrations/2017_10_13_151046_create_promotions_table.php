<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('promotions');
        Schema::create('promotions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('discount_for')->unsigned()->nullable();
          $table->integer('discount_value')->unsigned();
          $table->dateTime('start_date');
          $table->dateTime('end_date');

          $table->foreign('discount_for')->references('id')->on('foods')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
