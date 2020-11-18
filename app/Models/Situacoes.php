<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'esclarecimento',
        'quem_cuida',
        'religiao',
        'n_irmaos',
        'posicao_familia',
        'outras_informacoes',
    ];

    public function alunos(){
        return $this->hasMany('App\Models\Aluno');
    }
}
