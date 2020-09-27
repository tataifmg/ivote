<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->dateTime('data_inicio_votacao_comunidade', 0);	
            $table->dateTime('data_fim_votacao_comunidade', 0);	
            $table->string('status');	
            $table->string('resultado_proposta')->nullable();
            $table->string('observacao_proposta')->nullable();
            $table->foreignId('entidade_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propostas');
    }
}
