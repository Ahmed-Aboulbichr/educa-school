<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->integer('recieved')->comment('0 => no,1 => yes');

            //Foreing keys
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('deliveryMen_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('deliveryMen_id')->references('id')->on('users');

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
        Schema::dropIfExists('collections');
    }
}
