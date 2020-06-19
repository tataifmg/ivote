<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj')->unique();
            $table->string('endereco');
            $table->string('numero'); 
            $table->string('bairro');
            $table->foreignId('cidade_id')->constrained();
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
        Schema::dropIfExists('entidades');
    }
}
