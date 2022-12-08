<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('tiendas', function (Blueprint $table){
            $table->bigincrements('id');
            $table->string('clave', 30);
            $table->string('nombre', 50);
            $table->string('cantidad');
            $table->text('foto')->nullable();
            $table->decimal('costo');
            //$table->string('id_tipo');
            //$table->string('id_tienda');
         /*    $table->timestamps(); */


         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiendas');
    }
}
