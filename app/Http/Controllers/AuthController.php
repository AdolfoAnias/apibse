<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $request->validate([
             'email' => 'required|string|email',
             'password' => 'required|string',
             //'remember_me' => 'boolean'
        ]);  
        
        $credentials = request(['email', 'password']);
            
        if(Auth::attempt($credentials)){
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;           
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);  
        }    

        return response()->json([
          'access_token' => $token,
          'token_type' => 'Bearer',
          //'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);  
    }
    
    public function register(Request $request)
    {        
        $request->validate([
          'name' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string'
        ]); 
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); //bcrypt($request->password);
        $user->save(); 
        
        $token = $user->createToken('Personal Access Token')->accessToken;
        
        return response()->json([
          'token' => $token,  
          'message' => 'Successfully created user!'
        ], 200); 
    }
 
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        
        return response($response, 200);        
    }
    
    /**
    * Get the authenticated User
    *
    * @return [json] user object
    */  
    public function user(Request $request)
    {
      return response()->json($request->user());
    }    
    
}
