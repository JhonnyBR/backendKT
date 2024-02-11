<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenModel extends Model
{
    use HasFactory;

    protected $table = "orden";

    protected $fillables = [
        'numero_orden',
        'Cliente_idCliente',
        'Carrito_idCarrito',
        'MetodosEnvio_idMetodosEnvio',
        'MetodosPago_idMetodosPago'
    ];

    protected  $primaryKey = 'idOrden';
    
    public $timestamps = false;

    public function orden_carrito(){
        return $this->hasOne(CarritoModel::class, 'idCarrito', 'Carrito_idCarrito');
    }

    public function orden_producto(){
        return $this->hasOne(ClientesModel::class, 'idCliente', 'Cliente_idCliente');
    }

    public function orden_menvio(){
        return $this->hasOne(MetodosEnvioModel::class, 'idMetodosEnvio', 'MetodosEnvio_idMetodosEnvio');
    }

    public function orden_mepago(){
        return $this->hasOne(MetodosPagoModel::class, 'idMetodos', 'MetodosPago_idMetodosPago');
    }
}
