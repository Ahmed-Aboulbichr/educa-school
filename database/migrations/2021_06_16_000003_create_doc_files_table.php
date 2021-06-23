<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_files', function (Blueprint $table) {
            $table->id();
            //columns
            $table->string('type', 30);
            $table->longText('path');
            //foreign key

            $table->foreignId('candidature_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('document_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('etudiant_id')->nullable()->constrained()->onDelete('cascade');


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
        Schema::dropIfExists('doc_files');
    }
}
