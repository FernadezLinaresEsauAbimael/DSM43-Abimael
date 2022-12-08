<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    public $timestamps = false;
    protected $table = 'tiendas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'clave',
        'nombre',
        'cantidad',
        'costo',
        'foto',
        'id_tipo',
        'id_tienda',
    ];
}
