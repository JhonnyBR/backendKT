<?php
namespace App\Helpers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;


class JWTAuth{
    public function generateToken($id, $document){
        $key = env('JWT_SECRET');
        $dataToken = array(
            'Document' => $document,
            'Id' => $id,
            'iat' => time(),
            'exp' => time() +(5400)
        );
        $jwt = JWT::encode($dataToken, $key, 'HS256');
        return response()->json(['token' => $jwt], 200);
    }
}