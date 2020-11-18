<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie_periodo',
        'curso',
        'turno',
        'tipo_matricula',
        'ano',
        'status',
        'aluno_id',
    ];

    public function alunos()
    {
        return $this->belongsTo('App\Models\Aluno', 'aluno_id');
    }
    
}
