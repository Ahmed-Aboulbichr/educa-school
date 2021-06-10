<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('commission')->nullable();
            $table->string('clientName')->nullable();
            $table->string('clientPhone')->nullable();
            $table->string('clientAddress')->nullable();
            $table->string('sellersComment')->nullable();
            $table->string('deliveryMenComment')->nullable();
            
            //Foreign Key
            $table->unsignedBigInteger('orderState_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('deliveryMen_id')->nullable();
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('orderState_id')->references('id')->on('order_states');
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
        Schema::dropIfExists('orders');
    }
}
