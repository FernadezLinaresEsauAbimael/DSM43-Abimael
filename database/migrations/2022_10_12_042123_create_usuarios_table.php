<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('clave', 30);
            $table->string('nombre', 50);
            //$table->string('app', 50);
            //$table->string('apm', 50)->nullable();
            //$table->date('fn'); 
            $table->string('gen', 50); 
            $table->text('foto')->nullable();
            $table->text('email');
            $table->text('pass');
            $table->string('Rol', 50);
            //$table->boolean('activo'); 
            $table->timesTamps(); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

