<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $model = Product::all();  

            return response()->json([
                    "data" => $model, 
                    'type' => trans('msgs.type_success')
                ], 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist', ['model' => 'Team']),
                'type' => trans('msgs.type_error')
            ], 500);
        }                                                
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:30',
            'label_id'=>'required',
        ]);      
                
        if($validator->fails()){
            return response()->json([
                'error' => trans('msg_error'),
                'message' => $validator->messages(),
                'type' => trans('msgs.type_error')
            ], 422);
        }
        
        try {
            $model = Product::create(
            [
                'name' => $request->name,
                'label_id' => $request->label_id,
            ]);                         

            return response()->json([
                    "data" => $model, 
                    'type' => trans('msgs.type_success')
                ], 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist', ['model' => 'Team']),
                'type' => trans('msgs.type_error')
            ], 422);
        }                                                        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $model = Product::find($id);  

            return response()->json([
                    "data" => $model, 
                    'type' => trans('msgs.type_success')
                ], 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist', ['model' => 'Team']),
                'type' => trans('msgs.type_error')
            ], 500);
        }                                        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $model = Product::where('id','=', $id)->delete();

            return response()->json([
                    "data" => $model, 
                    'type' => trans('msgs.type_success')
                ], 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist', ['model' => 'Team']),
                'type' => trans('msgs.type_error')
            ], 500);
        }                                                

    }
}
