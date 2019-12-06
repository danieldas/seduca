<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solicitante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Solicitante', function (Blueprint $table) {

            $table->string('Ci', 20)->primary();
            
            $table->string('Nombre', 50);
            $table->string('ApPaterno', 50);
            $table->string('ApMaterno', 50);
            $table->integer('Telefono')->unsigned();
            $table->enum('Tipo', [
                    'Natural',
                    'Director', 
                    'Subdirector',  
                     
                ])->default('Natural');
            
            $table->enum('Sexo', [
                    'Masculino', 
                    'Femenino',  
                     
                ])->default('Masculino');

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
        Schema::dropIfExists('Solicitante');
    }
}
