<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfreceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Definimos los campos que llevara nuestra implementación y posteriormente agregamos 
        // sus tipos de datos. 
        Schema::create('ofrece', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('precio');  
            $table->integer('precion'); 
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
        Schema::dropIfExists('ofrece');
    }
}
