<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Unidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Unidad', function (Blueprint $table) {

            
            $table->increments('IdUnidad');
            $table->string('Nombre', 70);     
            $table->enum('Estado', [
                    'Alta', 
                    'Baja',                       
                ])->default('Alta');       
            
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
        Schema::dropIfExists('Unidad');
    }
}
