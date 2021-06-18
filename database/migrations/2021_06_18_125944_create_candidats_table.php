<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string("CNE",20);
            $table->string("CIN",10);
            $table->string("prenom_ar",20);
            $table->string("nom_ar",20);
            $table->string("lieu_naiss_fr",50);
            $table->string("lieu_naiss_ar",50);
            $table->date("date_naiss");
            $table->unsignedBigInteger('ville_id_etud');

            $table->foreign('ville_id_etud')->references('id')->on('ville');
            $table->foreignId('pays_id')->constrained();
            $table->foreignId('nationalite_id')->constrained();

            $table->string("tel",20)->unique();
            $table->string("adresse_etd",100);
            $table->string("situation_familiale",20);
            $table->char("sexe",20);

            $table->foreignId('bac_id')->constrained();

            $table->string("mention_bac",20);
            $table->double("mg_bac");
            $table->string("annee_bac",20);
            $table->string("lycee_bac",50);

            $table->foreignId('acad_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('deleguation_id')->constrained();

            $table->string("universite_dip_name",50);
            $table->string("pre_insc_annee_universitaire",20);
            $table->unsignedBigInteger('ville_id_parent');

            $table->foreignId('user_id')->constrained();
            $table->foreign('ville_id_parent')->references('id')->on('ville');

            $table->string("adresse_parent",100);
            $table->string("tel_parent",20)->unique();

            $table->enum('cat_pere', ['PUBLIC','PRIVE','LIBRE']);
            $table->enum('cat_mere', ['PUBLIC','PRIVE','LIBRE']);

            $table->foreignId('sec_profession_pere_id')->constrained();
            $table->foreignId('sec_profession_mere_id')->constrained();

            $table->string("profession_pere",20);
            $table->string("profession_mere",20);

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
        Schema::dropIfExists('candidats');
    }
}
