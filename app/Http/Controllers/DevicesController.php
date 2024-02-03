<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;
use Validator;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Devices::with('users')->paginate(50);

        return response()->json($devices);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'ip' => 'nullable',
            'location' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json(['validation' => $validator->errors()]);       
        }

        $input = $request->all();
        
        $device = Devices::create($input);

        return response()->json(
            [
                'data'=>$device
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
           // Find the device by ID
           $device = Devices::find($id);

           // Check if the device exists
           if (!$device) {
               return response()->json(['message' => 'Device not found'], 404);
           }
   
           // Return a JSON response with the retrieved device
           return response()->json(['data' => $device], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devices $devices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $device = Devices::find($id);

        if (!$device) {
            return response()->json(['message' => 'Device not found'], 404);
        }

        // Delete the device
        $device->delete();

        return response()->json(['message' => 'Device deleted successfully'], 200);
    }
}
