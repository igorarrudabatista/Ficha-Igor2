<?php

use App\Models\TB_ALUNO;
use App\Models\TB_CATEGORIA;
use App\Models\TB_ESCOLA;
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
        Schema::create('ficha', function (Blueprint $table) {


            $table->increments('id');

     
        ///1 tela - Motivo do Encaminhamento
        $table->string('Nome_resp_encaminhamento');
        $table->string('CPF_resp_encaminhamento');
        $table->string('Obs_motivo');
        ///2tela - Providencias da Unidade Escolar
        $table->date('Data_comunica_responsaveis');
        $table->string('Nome_comunica_responsaveis');
        $table->string('Porquem_comunica_responsaveis');
        $table->string('CPF_comunica_responsaveis');
        $table->string('Telefone_comunica_responsaveis');
        $table->string('Paraquem_comunica_responsaveis');
        $table->string('Conselho_comunica_responsaveis');
        ///Tela 3 - Registro de Encaminhamento da SEDUC
        $table->date('Data_comunica_tutelar');
        $table->string('Nome_tutelar');
        $table->string('CPF_tutelar');
        $table->string('Obs_tutelar');
        // Tela 4 - Registro de Encaminhamento do Ministerio Publico
        $table->date('Data_ministerio_publico');
        $table->string('Nome_ministerio_publico');
        $table->string('CPF_ministerio_publico');
        $table->string('Obs_ministerio_publico');
        
        $table->unsignedInteger('categoria_id');
        $table->foreign('categoria_id')->references('id')->on('categoria');

        $table->unsignedInteger('escola_id');
        $table->foreign('escola_id')->references('id')->on('escola');
           
        $table->unsignedInteger('aluno_id');
        $table->foreign('aluno_id')->references('id')->on('aluno');                 
        
        // $table->unsignedInteger('criado_por');
        // $table->foreign('criado_por')->references('id')->on('users');                 
         
        $table->string('FichaStatus');


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
        Schema::dropIfExists('ficha');

    }
};
