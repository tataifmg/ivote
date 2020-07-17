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
        'data_inicio_votacao_decisor',
        'data_fim_votacao_decisor',
        'status',
        'votantes',
        'chave_de_acesso',
        'entidade_id',
        'acompanhamento_id',
    ];
}
