<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'rg',
        'orgao_expedidor',
        'data_expedicao',
        'grau_instrucao',
        'email',
        'celular',
        'local_trabalho',
        'profissao',
        'telefone_trabalho',
    ];

    public function dataNascimento(){
        return (new \DateTime($this->attributes['data_nascimento']))->format('d/m/Y');
    }
    
    public function dataExpedicao(){
        return (new \DateTime($this->attributes['data_expedicao']))->format('d/m/Y');
    }

    public function alunos(){
        return $this->hasMany('App\Models\Aluno');
    }
}
