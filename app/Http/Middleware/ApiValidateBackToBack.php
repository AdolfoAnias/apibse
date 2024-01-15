<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Throwable;

class ApiValidateBackToBack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader("Authorization")) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized.',
            ], 401);
        }

        $bearer = $request->header('Authorization');
        $access_token = str_replace('Bearer ', '', $bearer);

        //$decrypted_token = Crypt::decryptString($access_token);
        $decrypted_token = $access_token;

        if (($decrypted_token != env("FOTC_FRASE_CIFRADO"))) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized.',
            ], 401);
        }else{
            return $next($request);
//            return response()->json([
//                'status' => 200,
//                'message' => 'Authorized.',
//            ], 200);            
        }    
           
//        if (!$this->validateAll($request)) {
//            return response()->json([
//                'status' => 402,
//                'message' => 'Unauthorized.',
//            ], 401);
//        }
        
        //return $next($request);
    }

    public function validateAll($request)
    {
//        try {
            $bearer = $request->header('Authorization');
            $access_token = str_replace('Bearer ', '', $bearer);
            
            $decrypted_token = Crypt::decryptString($access_token);
            
            return response()->json([
                'status' => $decrypted_token,
                'message' => env("FOTC_FRASE_CIFRADO"),
            ], 401);
            
            
            if (($decrypted_token != env("FOTC_FRASE_CIFRADO"))) {
                return false;
            }
            return true;
//        } catch (\Illuminate\Contracts\Encryption\DecryptException $ex) {
//            return false;
//        } catch (Throwable $ex){
//            throw $ex;
//        }
    }
}
