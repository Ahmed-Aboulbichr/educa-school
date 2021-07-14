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
            $table->string('specialite', 100);       //  LDW
            $table->foreignId('type_formation_id')->constrained()->onDelete('cascade'); // LP MASTER
            $table->foreignId('session_id')->constrained()->onDelete('cascade'); // formation se trouve dans une session
            $table->unsignedBigInteger('niveau_preRequise'); //You must to have a BAC + 2
            $table->string("niveau_acces",20);
            $table->date('dateLimite');
            $table->string('duree',10);
            $table->foreign('niveau_preRequise')->references('id')->on('niveau_etudes')->onDelete('cascade');  // BAC + 2
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
