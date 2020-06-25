<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'numero',
        'bairro',
        'cidade_id'  
    ];
}
