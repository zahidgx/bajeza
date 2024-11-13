<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'nombre_cliente',
        'descripcion_pedido',
        'ubicacion',
        'enviado',
    ];
}
