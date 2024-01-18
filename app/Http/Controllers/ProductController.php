<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $model = Product::all();  

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required|max:60',
            'description'=>'required',
            'price'=>'required',
        ]);      
                
        if($validator->fails()){
            return response()->json([
                'error' => trans('msg_error'),
                'message' => $validator->messages(),
                'type' => trans('msgs.type_error')
            ], 422);
        }

        if ($request->has('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            Storage::disk('public')->put($filename, file_get_contents($file));
        }
        
        try {
            $model = Product::create(
            [
                'image' => isset($request->file)? $filename:null,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price
            ]);                         

            return response()->json($model, 200);            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),
                'message' => trans('msgs.msg_error_model_no_exist'),
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
            $model = Product::where('id','=', $id)->delete();

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
