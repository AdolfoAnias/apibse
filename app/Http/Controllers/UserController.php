<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $model = User::all();  

            return response()->json($model, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist'),
                'type' => trans('msgs.type_error')
            ], 500);
        }                                                
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $model = User::find($id);  

            return response()->json($model, 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist'),
                'type' => trans('msgs.type_error')
            ], 500);
        }                                        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $model = User::where('id','=', $id)->delete();

            return response()->json($model, 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist'),
                'type' => trans('msgs.type_error')
            ], 500);
        }                                                

    }
}
