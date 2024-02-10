<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Helpers\JWTAuth;
use App\Models\LogsUserModel;

class UserController extends Controller
{
    public function get_user(){
        return UserModel::get();
    }

    public function generateToken($document = null, $id = null){
        if (!isset($document) || !isset($id)) {
            return response()->json(['message' => 'Data incompleta'], 400);
        }else{
            $status = UserModel::select('Active')
            ->where('Document', $document)
            ->where('idUser', $id)
            ->pluck('Active')
            ->first();
            if($status != 'TRUE' || !isset($status)){
                return response()->json(['message' => 'No aurozida, Recuerde usar /document/id'], 401);
            }else{
                date_default_timezone_set('America/Bogota');
                $JWTAuth = new JWTAuth();
                $data_log = [
                    'idRelational' => $id,
                    'DateTime' => date('d-m-y H:i:s')
                ];
                LogsUserModel::insert($data_log);
                return $JWTAuth->generateToken($id, $document);
            }
        }
    }
}
