<?php

namespace App\Http\Controllers;

use App\Models\MetodosPagoModel;
use Illuminate\Http\Request;

class MetodosPagoController extends Controller
{
    public function getMethods()
    {

        return MetodosPagoModel::get();
    }

    public function createMethod(Request $request){
        $data = [
            'nombre' => $request['Name'] ?? null
        ];
        if(in_array(null, $data)){
            return response()->json("Data invalida", 400);
        }
        $newMethod = MetodosPagoModel::insertGetId($data);

        return response()->json('Metodo creado con id ' . $newMethod, 200);
    } 
}
