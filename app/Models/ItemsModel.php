<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsModel extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillables = [
        'precio_venta',
        'precio_original',
        'precio_original',
        'cant',
        'descuento',
        'Producto_idProducto',
        'Carrito_idCarrito'
    ];

    protected  $primaryKey = 'idItems';
    
    public $timestamps = false;

    public function items_carrito(){
        return $this->hasOne(CarritoModel::class, 'idCarrito', 'Carrito_idCarrito');
    }

    public function items_producto(){
        return $this->hasOne(ProductoModel::class, 'idProducto', 'Producto_idProducto');
    }


}
