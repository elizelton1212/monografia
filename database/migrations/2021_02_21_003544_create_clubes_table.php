<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cores');
            $table->string('acronimo');
            $table->string('insignia')->nullable();
            $table->String('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();

            $table->bigInteger('apa_id')->unsigned();
            $table->foreign('apa_id')->references('id')->on('apas')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('clubes');
    }
}
