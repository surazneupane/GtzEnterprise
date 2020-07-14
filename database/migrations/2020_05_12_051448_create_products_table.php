<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('productname')->required();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('sku')->required();
            $table->longText('highlights')->required();
            $table->longText('description')->required();
            $table->string('productdim')->nullable();
            $table->string('dimunit')->nullable();
            $table->string('quantity')->nullable();
            $table->string('quantityunit')->nullable();
            $table->integer('MRP')->nullable();
            $table->integer('SP')->required();
            $table->string('returnaccepted')->required();
            $table->integer('returndays')->nullable();
            $table->integer('DTD')->required();
            $table->string('adminapproved')->default('No');
            $table->string('status')->default('inActive');
            $table->integer('category_id');
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
        Schema::dropIfExists('products');
    }
}
