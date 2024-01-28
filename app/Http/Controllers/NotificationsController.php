<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Exception;
use Illuminate\Http\Request;
use Validator;

class NotificationsController extends Controller
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
        $validator = Validator::make($request->all(), [
            'subject'=>'required',
            'description'=>'nullable',
            'user'=>'required',
            'status'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation' => $validator->errors()]);       
        }

        $input = $request->all();
        
        try{

            $organization = Notifications::create($input);
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
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifications $notifications)
    {
        //
    }
}
