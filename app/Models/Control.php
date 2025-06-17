<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'control'; 
    protected $fillable = ['nombre_reservador', 'numero_personas', 'fecha_entrada', 'fecha_salida', 'costo', 'telefono', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function cabanas()
    {
        return $this->belongsToMany(Cabana::class, 'control_cabana', 'control_id', 'cabana_id')
                    ->withPivot('fecha_reservacion');
    }
    
}
