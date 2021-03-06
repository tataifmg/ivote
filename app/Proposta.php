<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'data_inicio_votacao_comunidade',
        'data_fim_votacao_comunidade',
        'status',
        'resultado_proposta',
        'observacao_proposta',
        'entidade_id',
    ];
    protected $dates = [
        'data_inicio_votacao_comunidade',
        'data_fim_votacao_comunidade',
    ];
    
    
}
