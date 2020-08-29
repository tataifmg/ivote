<?php

use App\Entidade;
use Illuminate\Database\Seeder;

/**
 * Class EstadoTableSeeder.
 */
class EntidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        $e= new Entidade();
        $e->id='1';
        $e->nome='IFMG';
        $e->cnpj='75.502.843/0001-95';
        $e->endereco='Rua São Luiz';
        $e->numero='589';
        $e->bairro='São Luiz';
        $e->cidade_id='1';
        $e->created_at='2020-08-07 19:32:59';
        $e->updated_at='2020-08-07 19:32:59';
        $e->save();
    }
}
