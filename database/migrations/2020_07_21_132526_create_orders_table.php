<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('buyer_id')->required();
            $table->String('checkoutname')->required();
            $table->bigInteger('checkoutphone')->required();
            $table->String('checkoutregion')->required();
            $table->String('checkoutcity')->required();
            $table->String('checkoutaddress')->required();
            $table->String('orderstatus');
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
        Schema::dropIfExists('orders');
    }
}
