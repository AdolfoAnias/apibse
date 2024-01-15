<?php

namespace App\Http\Controllers;

use App\Models\UserSystem;
use Illuminate\Http\Request;

class UserSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $model = UserSystem::find($id);  

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
    public function edit(UserSystem $userSystem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserSystem $userSystem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $model = UserSystem::where('id','=', $id)->delete();

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
