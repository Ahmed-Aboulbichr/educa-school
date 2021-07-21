<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_07_19_223616_create_candidature_cursus_universitaires.php
class CreateCandidatureCursusUniversitairesTable extends Migration
=======
class CreateCandidatureCursusUniversitaireTable extends Migration
>>>>>>> 11ee12ae3e982033533b624bf1dbda40028988d8:database/migrations/2021_07_20_232547_create_candidature_cursus_universitaire_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_07_19_223616_create_candidature_cursus_universitaires.php
        Schema::create('candidature_cursus_universitaires', function (Blueprint $table) {
=======
        Schema::create('candidature_cursus_universitaire', function (Blueprint $table) {
>>>>>>> 11ee12ae3e982033533b624bf1dbda40028988d8:database/migrations/2021_07_20_232547_create_candidature_cursus_universitaire_table.php
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
