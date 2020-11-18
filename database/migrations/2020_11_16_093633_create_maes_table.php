<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('data_nascimento', 10);
            $table->string('cpf', 14)->unique();
            $table->string('rg');
            $table->string('orgao_expedidor');
            $table->string('data_expedicao', 10);
            $table->string('grau_instrucao', 30);
            $table->string('email')->nullable();
            $table->string('celular', 15);
            $table->string('local_trabalho')->nullable();
            $table->string('profissao')->nullable();
            $table->string('telefone_trabalho', 14)->nullable();
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
        Schema::dropIfExists('maes');
    }
}
