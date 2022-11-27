<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['id','foto','clave','nombre','cantidad','costo',
    'id_tipo','id_tienda','activo'];
}
