<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoTramite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TipoTramite', function (Blueprint $table) {

            $table->increments('IdTipoTramite');
            
            $table->string('Nombre', 70);
            $table->integer('TiempoAprox')->unsigned();
            
   
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
        Schema::dropIfExists('TipoTramite');
    }
}
