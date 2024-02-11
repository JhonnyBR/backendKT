<?php

namespace App\Http\Controllers;

use App\Models\ClientesModel;
use Hamcrest\Type\IsObject;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ClientesController extends Controller
{
    function getClients(){
        return ClientesModel::get();
    }

    function getClientbyDocument($docuemnt = null){
        if(!isset($docuemnt)){
            return response()->json(['message' => 'Información incompleta'], 400);
        }
        $client = ClientesModel::where('documento', $docuemnt)->first();
        if(!$client){
            return response()->json(['message' => 'No se ha encontrado el cliente'], 200);
        }else{
            return response()->json([$client], 200);
        }
    }
}
