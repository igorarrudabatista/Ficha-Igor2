<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escola', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EscolaCod');
            $table->string('EscolaNome');
            $table->string('EscolaEndereco');
            $table->string('EscolaNumero');
            $table->string('EscolaBairro');
            $table->string('EscolaCep');
            $table->string('EscolaCidade');
            $table->string('EscolaEstado');
            $table->string('EscolaDDD');
            $table->string('EscolaTel');
            $table->string('EscolaEmail');
            $table->string('EscolaStatus');
            
            // $table->unsignedInteger('aluno_id');
            // $table->foreign('aluno_id')->references('id')->on('aluno');                 
             
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
        Schema::dropIfExists('escola');

    }
};
