<?php

namespace App\Http\Controllers;

use App\Models\Cashbox;
use Exception;
use Illuminate\Http\Request;
use Validator;

class CashboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Cashbox::all();

        return response()->json(['data' => $records], 200);
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
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'balance'=>'required',
            'organization'=>'required',
            'status'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation' => $validator->errors()]);       
        }

        $input = $request->all();
        
        try{

            $organization = Cashbox::create($input);
            return response()->json($organization,200);

        }catch(Exception $exception){
            return response()->json(
                [ 
                    'error' => $exception->getMessage(),
                ],
                400
            );
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(int $cashboxId)
    {
        $cashbox = Cashbox::find($cashboxId);

        if(!$cashbox){
            return response()->json(
                [
                    'message'=>'Cashbox not found'
                ],404
            );
        }else{
            return response()->json(
                [
                    'data'=>$cashbox
                ]
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashbox $cashbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cashbox $cashbox)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
            'balance' => 'nullable',
            'organization' => 'nullable',
            'status' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => $validator->errors()]);
        }

        $input = $request->all();

        try {
            $cashbox->update($input);

            return response()->json($cashbox, 200);

        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $cashboxId)
    {
        $cashbox = Cashbox::find($cashboxId);

        if (!$cashbox) {
            return response()->json(['message' => 'Cashbox not found'], 404);
        }

        $cashbox->delete();

        return response()->json(['data' => $cashbox], 200);

    }

}
