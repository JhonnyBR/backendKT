<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use Exception;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function Create_product(Request $request){
        $data = [
            "nombre" => $request['Name'] ?? null,
            "sku" => $request['Sku'] ?? null,
            'precio' => ($request['Price']) ?? null,
            'compare_precio' => ($request['CompPrice']) ?? null,
            'cant' => $request['Cant'] ?? null
        ];
        if(in_array(null, $data)){
            return response()->json(['message' => 'Información incompleta'], 400);
        }
        try{
            $id = ProductoModel::insertGetId($data);
            if(!is_integer($id)){
                return response()->json(['message' => "Producto creado con ID ". $id], 200);
            }else{
                return response()->json(['message' => $id], 400);
            }
        }catch (Exception $e){
            return response()->json(['message' => $e], 400);
        }
    }

    public function getTotal(){

        return ProductoModel::get();
    }

    public function getStock($stock = null){
        $query = ProductoModel::query();
        if ($stock !== null) {
            if (is_numeric($stock)) {
                $query->where('cant', $stock);
            } else {
                if (preg_match('/^([<>]=?)?\s*(\d+)$/', $stock, $matches)) {
                    $operator = isset($matches[1]) ? $matches[1] : '=';
                    $value = $matches[2];
                    $query->where('cant', $operator, $value);
                } else {
                    $query->where('cant', $stock);
                }
            }
        }
        return $query->get();
    }

    public function updateCant($stock = null, $id = null){
        if(!isset($stock) || !isset($id)){
            return response()->json(['Data Invalida'], 400);
        }
        try{
            $data = [
                'cant' => $stock
            ];
            ProductoModel::where('idProducto', $id)->update($data);
            return response()->json(['Stock Actualizado'], 200);
        }catch (Exception $e){
            return response()->json(['Falla al actualizar '. $e->getMessage()], 400);
        }
    }
    
}
