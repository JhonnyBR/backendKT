<?php

namespace App\Http\Controllers;

use App\Models\CarritoModel;
use Illuminate\Http\Request;
use Exception;

class CarritoController extends Controller
{
    public function getCar($id = null){
        if(!isset($id)){
            return response()->json('Data invalida', 400);
        }
        return CarritoModel::where('idCarrito', $id)->first();
    }

    public function getAllCars(){
        return CarritoModel::get();
    }

    public function create(Request $request){
        $data = [
            "descuento" => $request['Discount'] ?? null,
            "total" => $request['Total'] ?? null,
            "subtotal" => $request['Subtotal'] ?? null
        ];
        if(in_array(null, $data)){
            return response()->json('Data invalida', 400);
        }
        try{
            $id = CarritoModel::insertGetId($data);
            if(is_integer($id)){
                return response()->json(['message' => "Carrito creado con ID ". $id], 200);
            }else{
                return response()->json(['message' => $id], 400);
            }
        }catch (Exception $e){
            return response()->json(['message' => $e], 400);
        }
    }
}
