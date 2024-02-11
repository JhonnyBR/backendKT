<?php

namespace App\Http\Controllers;

use App\Models\OrdenModel;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function getOrders(){
        return OrdenModel::with('orden_carrito')->with('orden_menvio')->with('orden_mepago')->get();
    }

    public function createOrder(Request $request){
        $data = [
            'numero_orden' => $request['norden'] ?? null,
            'Cliente_idCliente' => $request['idclient'] ?? null,
            'Carrito_idCarrito' => $request['idcarrito'] ?? null,
            'MetodosEnvio_idMetodosEnvio' => $request['menvios'] ?? null,
            'MetodosPago_idMetodosPago' => $request['mepagos'] ?? null
        ];
        if(in_array(null, $data)){
            return response()->json('Data invalida', 400);
        }
        $newOrden = OrdenModel::insertGetId($data);
        return response()->json('Orden creada con ID '. $newOrden, 200);

    }
}
