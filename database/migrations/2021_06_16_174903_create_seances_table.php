<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matiere_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('salle_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('semestre_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('sous_groupe_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('groupe_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->enum('jour', ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche']);
            $table->integer('duree');
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
        Schema::dropIfExists('seances');
    }
}
