<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votacao extends Model
{
    protected $fillable = [
        'user_id',
        'proposta_id',
        'resposta',
    ];
}
