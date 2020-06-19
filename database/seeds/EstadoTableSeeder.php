<?php

use Illuminate\Database\Seeder;
use App\Estado;

/**
 * Class EstadoTableSeeder.
 */
class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dados = [
			['Acre', 'AC', 12],
			['Alagoas', 'AL', 27],
			['Amapá', 'AP', 16],
			['Amazonas', 'AM', 13],
			['Bahia', 'BA', 29],
			['Ceará', 'CE', 23],
			['Distrito Federal', 'DF', 53],
			['Espírito Santo', 'ES', 32],
			['Goiás', 'GO', 52],
			['Maranhão', 'MA', 21],
			['Minas Gerais','MG', 31],
			['Mato Grosso do Sul', 'MS', 50],
			['Mato Grosso', 'MT', 51],
			['Pará', 'PA', 15],
			['Paraíba', 'PB', 25],
			['Pernambuco', 'PE', 26],
			['Piauí', 'PI', 22],
			['Paraná', 'PR', 41],
			['Rio de Janeiro', 'RJ', 33],
			['Rio Grande do Norte', 'RN', 24],
			['Rondônia', 'RO', 11],
			['Roraima', 'RR', 14],
			['Rio Grande do Sul', 'RS', 43],
			['Santa Catarina', 'SC', 42],
			['Sergipe', 'SE', 28],
			['São Paulo', 'SP', 35],
			['Tocantins', 'TO', 17],
		];

		foreach ($dados as $d) {
		    Estado::create([
		        'nome' => $d[0],
		        'uf' => $d[1],
		    ]);
		}
    }
}
