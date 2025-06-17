<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionCabanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up()
        {
            Schema::create('reservacion_cabana', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('reservacion_id');
                $table->unsignedBigInteger('cabana_id');
                $table->date('fecha_reservacion'); // Nueva columna para la fecha de la reservación
                $table->foreign('reservacion_id')->references('id')->on('reservaciones')->onDelete('cascade');
                $table->foreign('cabana_id')->references('id')->on('cabanas')->onDelete('cascade');
                $table->timestamps();
            });
        }
           

    public function down()
    {
        Schema::dropIfExists('reservacion_cabana');
    }
}
