<?php

namespace App\Http\Controllers;

use App\Models\ItemsModel;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    function getItems()
    {
        return ItemsModel::with('items_carrito')->with('items_producto')->get();
    }

    function getItemsById($id =  null){
        if(!isset($id)){
            return response()->json('Data invalida', 400);
        }
        $items = ItemsModel::where('idItems', $id)->with('items_carrito')->with('items_producto')->first();
        if(!$items){
            return response()->json('Sin registro', 200);
        }else{
            return $items;
        }
    }
}
