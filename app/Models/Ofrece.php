<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofrece extends Model
{
    use HasFactory;
    // se re nombra el nombre de la tabla ya que no se encontraba a la hora
    // de ejecutar el metodo index
    protected $table = 'ofrece'; 
    // parametros que va a recibir un objeto de este tipo. 
    protected $fillable = ['nombre', 'precio','precion','descripcion'];
}
