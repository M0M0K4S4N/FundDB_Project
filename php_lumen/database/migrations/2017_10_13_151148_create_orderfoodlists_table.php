<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderfoodlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('orderfoodlists');
        Schema::create('orderfoodlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('food_id')->unsigned()->nullable();
            $table->integer('Qty')->unsigned();
            $table->integer('cook_by')->unsigned()->nullable();
            $table->integer('cooking_flag')->unsigned();
            $table->integer('serve_flag')->unsigned();
            $table->integer('isPaid')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('cook_by')->references('id')->on('employees')->onDelete('set null')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderfoodlists');
    }
}
