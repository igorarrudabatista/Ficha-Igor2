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
        Schema::create('ministerio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MinisterioNome');
            $table->string('MinisterioStatus');
            $table->string('MinisterioEmail');
            $table->string('MinisterioDDD');
            $table->string('MinisterioFone');
            $table->string('MinisterioEndereco');
            $table->string('MinisterioEndBairroId');
            $table->string('MinisterioEndNmr');
            $table->string('MinisterioCidade');
            $table->string('MinisterioEstado');
  
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
        Schema::dropIfExists('ministerio');

    }
};
