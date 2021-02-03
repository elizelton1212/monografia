<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFederacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('federacaos', function (Blueprint $table) {
           $table->id();
           $table->string ("nome");
           $table->string("sigla");
           $table->string("modalidade"); 
           $table->string("president");
           $table->integer("telefone"); 
           $table->string('email');
           $table->string('imagem');
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
        Schema::dropIfExists('federacaos');
    }
}
