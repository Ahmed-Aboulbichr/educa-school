<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursusUniversitairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursus_universitaires', function (Blueprint $table) {
            $table->id();
            $table->string('specialite', 100);  //DUT:INFORMATIQUE
            $table->string('univ_nom', 100);     //Univ ibn zohr
            $table->double('note_S1');
            $table->double('note_S2');
            $table->string('Annee_univ', 20);   //2018-2019
            //    $table->foreignId('niveau_etude_id')->nullable()->constrained()->onDelete('cascade'); // BAC + 2
            $table->foreignId('candidat_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('cursus_universitaires');
    }
}
