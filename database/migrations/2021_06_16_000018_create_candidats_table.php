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
            $table->string("CNE", 20);
            $table->string("CIN", 10);
            $table->string("prenom_fr", 20)->nullable();
            $table->string("nom_fr", 20)->nullable();
            $table->string("prenom_ar", 20)->nullable();
            $table->string("nom_ar", 20)->nullable();
            $table->string("lieu_naiss_fr", 50)->nullable();
            $table->string("lieu_naiss_ar", 50)->nullable();
            $table->date("date_naiss")->nullable();
            $table->string("tel", 20)->nullable();
            $table->string("adresse_etd", 100)->nullable();
            $table->string("situation_familiale", 20)->nullable();
            $table->enum('sexe', ['Homme', 'Femme'])->nullable();
            $table->string("mention_bac", 20)->nullable();
            $table->double("mg_bac")->nullable();
            $table->string("annee_bac",20)->nullable();
            $table->string("lycee_bac",50)->nullable();
            $table->string("type_bac",50)->nullable();
            $table->string("adresse_parent",100)->nullable();
            $table->string("tel_parent",20)->nullable();
            $table->enum('cat_pere', ['PUBLIC','PRIVE','LIBRE'])->nullable();
            $table->enum('cat_mere', ['PUBLIC','PRIVE','LIBRE'])->nullable();
            $table->string("CIN_pere",10)->nullable();
            $table->string("CIN_mere",10)->nullable();
            $table->string("profession_pere",50)->nullable();
            $table->string("profession_mere",50)->nullable();
            $table->unsignedBigInteger('ville_id_etud')->nullable();
            $table->unsignedBigInteger('ville_id_parent')->nullable();
            $table->unsignedBigInteger('editor_id')->nullable();
            $table->unsignedBigInteger('sec_profession_pere_id')->nullable();
            $table->unsignedBigInteger('sec_profession_mere_id')->nullable();


            $table->foreignId('academie_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('province_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('delegation_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('cascade')->default(null);
            $table->foreignId('pay_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('nationalite_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreign('ville_id_parent')->references('id')->on('villes')->onDelete('cascade')->default(null);

            $table->foreign('sec_profession_pere_id')->references('id')->on('secteur_professions')->onDelete('cascade')->default(null);
            $table->foreign('sec_profession_mere_id')->references('id')->on('secteur_professions')->onDelete('cascade')->default(null);
            $table->foreign('ville_id_etud')->references('id')->on('villes')->onDelete('cascade')->default(null);
            $table->boolean('completed')->default(false)->nullable();

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
