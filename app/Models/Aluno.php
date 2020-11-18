<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'naturalidade',
        'sexo',
        'cor',
        'celular',
        'endereco',
        'bairro',
        'cep',
        'pai_id',
        'mae_id',
        'parente_1_id',
        'parente_2_id',
        'situacoes_id',
    ];

    public function dataNascimento(){
        return (new \DateTime($this->attributes['data_nascimento']))->format('d/m/Y');
    }

    public function matriculas(){
        return $this->hasMany('App\Models\Matricula');
    }

    public function pais()
    {
        return $this->belongsTo('App\Models\Pai', 'pai_id');
    }

    public function maes()
    {
        return $this->belongsTo('App\Models\Mae', 'mae_id');
    }

    public function parente_1()
    {
        return $this->belongsTo('App\Models\Parente', 'parente_1_id');
    }

    public function parente_2()
    {
        return $this->belongsTo('App\Models\Parente', 'parente_2_id');
    }

    public function situacoes()
    {
        return $this->belongsTo('App\Models\Situacoes', 'situacoes_id');
    }
}
