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
        $table->string('Nome_resp_encaminhamento')->nullable();
        $table->string('CPF_resp_encaminhamento')->nullable();
        $table->string('Obs_motivo')->nullable();
        ///2tela - Providencias da Unidade Escolar
        $table->date('Data_comunica_responsaveis')->nullable();
        $table->string('Nome_comunica_responsaveis')->nullable();
        $table->string('Porquem_comunica_responsaveis')->nullable();
        $table->string('CPF_comunica_responsaveis')->nullable();
        $table->string('Telefone_comunica_responsaveis')->nullable();
        $table->string('Paraquem_comunica_responsaveis')->nullable();
        $table->string('Conselho_comunica_responsaveis')->nullable();
        ///Tela 3 - Registro de Encaminhamento da SEDUC
        $table->date('Data_comunica_tutelar')->nullable();
        $table->string('Nome_tutelar')->nullable();
        $table->string('CPF_tutelar')->nullable();
        $table->string('Obs_tutelar')->nullable();
        // Tela 4 - Registro de Encaminhamento do Ministerio Publico
        $table->date('Data_ministerio_publico')->nullable();
        $table->string('Nome_ministerio_publico')->nullable();
        $table->string('CPF_ministerio_publico')->nullable();
        $table->string('Obs_ministerio_publico')->nullable();
        
        $table->string('FichaStatus')->nullable();

        $table->unsignedInteger('categoria_id');
        $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');

        $table->unsignedInteger('escola_id');
        $table->foreign('escola_id')->references('id')->on('escola')->onDelete('cascade');
           
        $table->unsignedInteger('aluno_id');
        $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
        

        $table->integer('user_id')->nullable()->unsigned();

// then the foreign key
// $table->foreign('user_id')->references('id')->on('users');
        // $table->unsignedInteger('criado_por');
        // $table->foreign('criado_por')->references('id')->on('users');                 
         


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
