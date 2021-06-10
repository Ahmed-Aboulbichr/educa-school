<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('cin')->nullable();
            $table->string('phone')->nullable();
            $table->string('fix')->nullable();
            $table->string('picture')->nullable();
            $table->string('companyName')->nullable();
            $table->string('companyEmail')->nullable();
            $table->string('activities')->nullable();
            $table->string('fbLinkPage')->nullable();
            $table->string('igLinkPage')->nullable();
            $table->string('website')->nullable();
            $table->string('description')->nullable();
            $table->string('comission')->nullable();

            //Foreing keys
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->unsignedBigInteger('livingCity_id')->nullable();
            $table->foreign('transport_id')->references('id')->on('transports');
            $table->foreign('livingCity_id')->references('id')->on('cities');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
