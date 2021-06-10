<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            //Foreign Key
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_collections');
    }
}
