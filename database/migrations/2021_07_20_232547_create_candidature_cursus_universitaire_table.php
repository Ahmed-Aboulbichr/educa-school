<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatureCursusUniversitaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidature_cursus_universitaire', function (Blueprint $table) {
            $table->id();
            //columns foreign key
            $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->foreignId('cursus_universitaire_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('candidature_cursus_universitaire');
    }
}
