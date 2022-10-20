<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function(Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->text('foto'); 
            $table->string('clave', 100);
            $table->string('nombre', 100);
            $table->integer('cantidad');
            $table->integer('costo');  
            $table->integer('id_tipo');
            $table->integer('id_tienda'); 
            $table->boolean('activo');
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
        Schema::dropIfExists('productos');
    }
}
