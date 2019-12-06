<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario', function (Blueprint $table) {

            $table->string('Cuenta', 30)->primary();
            $table->string('password', 200);
            $table->enum('Rol', [
                    'Administrador', 
                    'Jefe Departamento',  
                    'Subordinado',
                     
                ])->default('Jefe Departamento');
            $table->string('Nombre', 50);
            $table->string('Apellido', 50);
            $table->string('Ci', 20);
            $table->enum('Estado', [
                    'Alta', 
                    'Baja',  
                     
                ])->default('Alta');
   
            $table->rememberToken();
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
        Schema::dropIfExists('Usuario');
    }
}
