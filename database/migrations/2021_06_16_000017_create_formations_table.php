<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('type');        // LP
            $table->string('niveau_etude');    //  Acces aux BAC + 3
            $table->string('specialite');       //  LDW
            $table->dateTime('date_ouverture_pre_inscription', 2);
            $table->dateTime('date_fermeture_pre_ins', 2);
            $table->string('niveau_preRequise'); // BAC + 2
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
        Schema::dropIfExists('formations');
    }
}
