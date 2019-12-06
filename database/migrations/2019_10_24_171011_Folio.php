<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Folio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Folio', function (Blueprint $table) {

            $table->increments('IdFolio');

            $table->enum('Estado', [
                    'Pendiente', 
                    'Revisión',
                    'Finalizado',  
                     
                ])->default('Pendiente');

            $table->string('Observacion', 200);
            $table->string('Referencia', 100);
            $table->dateTime('Fecha');
            $table->string('FkSolicitante', 20);
            $table->integer('FkTipoTramite')->unsigned();
            
            $table->timestamps(); 

            $table->foreign('FkSolicitante')
                ->references('Ci')
                ->on('Solicitante'); 
                
            $table->foreign('FkTipoTramite')
                ->references('IdTipoTramite')
                ->on('TipoTramite');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Folio');
    }
}
