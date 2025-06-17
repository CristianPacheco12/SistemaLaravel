<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabana extends Model
{

    // Definimos los campos los cuales se deberan rellenar al momento de crear un objeto de este tipo.
    use HasFactory;
    protected $fillable = ['nombre', 'capacidad','disponibilidad','descripcion'];

    
    // Relación con las reservaciones
    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class);
    }

    public function control()
    {
        return $this->hasMany(Control::class);
    }
}

