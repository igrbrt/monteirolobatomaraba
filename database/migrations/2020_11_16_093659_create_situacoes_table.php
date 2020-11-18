<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacoes', function (Blueprint $table) {
            $table->id();
            $table->string('esclarecimento', 512)->nullable();
            $table->string('quem_cuida')->nullable();
            $table->string('religiao')->nullable();
            $table->integer('n_irmaos')->nullable();
            $table->string('posicao_familia')->nullable();
            $table->string('outras_informacoes', 1024)->nullable();
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
        Schema::dropIfExists('situacoes');
    }
}


