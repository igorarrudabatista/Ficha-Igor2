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
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AlunoNome');
            $table->string('AlunoDataNascimento');
            $table->string('AlunoCPF');
            $table->string('AlunoSexo');
            $table->string('AlunoFiliacao1');
            $table->string('AlunoFiliacao2');
            $table->string('AlunoEndereco');
            $table->string('AlunoNumero');
            $table->string('AlunoBairro');
            $table->string('AlunoCEP');
            $table->string('AlunoCidade');
            $table->string('AlunoEstado');
            $table->string('AlunoDDD');
            $table->string('AlunoTelefone');
            $table->string('AlunoObs');
     

            // $table->foreignId('FichaCatID')->constrained('tb_categoria')->onDelete('cascade');
            // $table->foreignId('FichaEscolaID')->constrained('tb_escola')->onDelete('cascade');
            // $table->foreignId('FichaAlunoID')->constrained('tb_aluno')->onDelete('cascade');
            // $table->foreignId('FichaAlunoID')->constrained('tb_aluno')->onDelete('cascade');


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
        Schema::dropIfExists('aluno');
    }
};
