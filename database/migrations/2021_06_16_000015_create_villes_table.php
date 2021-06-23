<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('state_id')->nullable();
            $table->string('state_code')->nullable();
            $table->string('country_id')->nullable();
            $table->string('country_code')->nullable();
            $table->double('latitude', 15, 15)->nullable();
            $table->double('longitude', 15, 15)->nullable();
            $table->string('flag')->nullable();
            $table->string('wikiDataId')->nullable();
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
        Schema::dropIfExists('villes');
    }
}
