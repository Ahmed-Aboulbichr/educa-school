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
            $table->string('specialite',100);       //  LDW
       //    $table->foreignId('type_formation_id')->nullable()->constrained()->onDelete('cascade'); // LP MASTER
       //     $table->foreignId('niveau_etude_id')->nullable()->constrained()->onDelete('cascade'); //  BAC + 3 BAC +2

       //     $table->unsignedBigInteger('niveau_preRequise')->nullable();
       //     $table->foreign('niveau_preRequise')->references('id')->on('niveau_etudes')->onDelete('cascade')->nullable();  // BAC + 2
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
