<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosDetalle extends Model
{
    use HasFactory;

    protected $table = 'pedidos_detalles';

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'costo',
    ];

    public function pedido(){
        return $this->belongTo(Pedidos::class, 'pedido_id');
    }
    public function producto(){
        return $this->belongTo(Productos::class, 'producto_id');
    }
}
