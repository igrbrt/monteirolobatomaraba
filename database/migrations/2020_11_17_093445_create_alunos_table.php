<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('data_nascimento', 10);
            $table->string('naturalidade');
            $table->string('sexo', 9);
            $table->string('cor', 8);
            $table->string('celular', 15)->nullable();
            $table->string('endereco', 512);
            $table->string('bairro');
            $table->string('cep', 9);
            $table->foreignId('pai_id')->nullable()->references('id')->on('pais');
            $table->foreignId('mae_id')->references('id')->on('maes');
            $table->foreignId('parente_1_id')->nullable()->references('id')->on('parentes');
            $table->foreignId('parente_2_id')->nullable()->references('id')->on('parentes');
            $table->foreignId('situacoes_id')->references('id')->on('situacoes');
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
        Schema::dropIfExists('alunos');
    }
}
