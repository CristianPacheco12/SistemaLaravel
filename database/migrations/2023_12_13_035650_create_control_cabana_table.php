<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlCabanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_cabana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('control_id');
            $table->unsignedBigInteger('cabana_id');
            $table->date('fecha_reservacion'); // Nueva columna para la fecha de la reservación
            $table->foreign('control_id')->references('id')->on('control')->onDelete('cascade');
            $table->foreign('cabana_id')->references('id')->on('cabanas')->onDelete('cascade');
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
        Schema::dropIfExists('control_cabana');
    }
}
