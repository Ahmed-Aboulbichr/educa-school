<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action')->nullable();
            $table->date('text')->nullable();
            $table->string('color')->nullable();
            $table->string('comment')->nullable();
            $table->string('orderState')->nullable();
            
            //Foreign Key
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('deliveryMen_id')->nullable();
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('deliveryMen_id')->references('id')->on('users');
            $table->foreign('collection_id')->references('id')->on('collections');
            
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
        Schema::dropIfExists('order_histories');
    }
}
