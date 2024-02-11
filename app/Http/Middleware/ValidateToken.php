<?php 
namespace App\Http\Middleware;

use Closure;
use Clousure;
use Exception;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;

class ValidateToken {
    public function handle(Request $request, Closure $next){
        $key = env('JWT_SECRET');
        $token = $request->header('Authorization');
        if(!$token){
            return response()->json([
                'error' => 'Token not provided'
            ],401);
        }
        $token = str_replace('Bearer ', '', $token);
        try{
            $credentials = JWT::decode($token, new key($key, "HS256"));
            return $next($request);
        } catch(ExpiredException $e){
            return response()->json([
                'error' => 'Provided token is expired.'
            ],400);
        } catch (Exception $e){
            return response()->json([
                'error' => 'An error ocurred while decoding token.'
            ],401);
        }
    }  
}

?>