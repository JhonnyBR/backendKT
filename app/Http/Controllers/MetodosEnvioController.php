<?php

namespace App\Http\Controllers;

use App\Models\MetodosEnvioModel;
use Illuminate\Http\Request;

class MetodosEnvioController extends Controller
{
    public function getMethods()
    {

        return MetodosEnvioModel::get();
    }

    public function createMethod(Request $request){
        $data = [
            'nombre' => $request['Name'] ?? null,
            'valor' => $request['Value'] ?? null
        ];

        if(in_array(null, $data)){
            return response()->json("Data invalida", 400);
        }
        $newMethod = MetodosEnvioModel::insertGetId($data);

        return response()->json('Metodo creado con id ' . $newMethod, 200);
    } 
}
