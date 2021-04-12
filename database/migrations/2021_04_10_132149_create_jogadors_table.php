<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('dataNascimento');
            $table->string('categoria');
            $table->string('posicao');
            $table->string('nacionalidade');
            $table->bigInteger('localizacao_id')->unsigned();
            $table->foreign('localizacao_id')->references('id')->on('localizacaos')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('jogadors');
    }
}
