<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'actividades'; 
    protected $fillable = ['nombre', 'precio', 'precion', 'descripcion'];
    protected $primaryKey = 'id';
}
