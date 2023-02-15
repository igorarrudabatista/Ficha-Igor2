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
        Schema::create('Agenda', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_time');
            $table->datetime('finish_time');
            $table->longText('comments')->nullable();
            $table->foreignId('users')->constrained();
            // $table->foreignId('employee_id')->constrained();
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
        //
    }
};