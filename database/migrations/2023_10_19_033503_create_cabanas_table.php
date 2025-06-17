<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Definimos el nombre de la tabla. 
        Schema::create('cabanas', function (Blueprint $table) {
            // Definimos sus campos y sus tipos de datos. 
            $table->id();
            $table->string('nombre');
            $table->integer('capacidad');  
            $table->boolean('disponibilidad')->default(true);
            $table->text('descripcion');
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
        Schema::dropIfExists('cabanas');
    }
}
