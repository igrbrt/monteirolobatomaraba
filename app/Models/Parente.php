<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'celular',
    ];

    public function alunos(){
        return $this->hasMany('App\Aluno');
    }
}
