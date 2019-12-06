<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsignacionUnidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AsignacionUnidad', function (Blueprint $table) {

            $table->increments('IdAsignacion');

            $table->string('FkUsuario', 30);
            $table->integer('FkUnidad')->unsigned();
            
            $table->timestamps(); 

            $table->foreign('FkUsuario')
                ->references('Cuenta')
                ->on('Usuario'); 
                
            $table->foreign('FkUnidad')
                ->references('IdUnidad')
                ->on('Unidad');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AsignacionUnidad');
    }
}
