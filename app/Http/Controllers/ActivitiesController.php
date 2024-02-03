<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
 
class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activities::all();


        return response()->json(['data' => $activities], 200);
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
    
        $newRecord = Activities::create($validatedData);
    
        return response()->json(['message' => 'Record created successfully', 'data' => $newRecord], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activities $activities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
                $activities = Activities::find($id);
    
        if (!$activities) {
            return response()->json(['message' => 'Record not found'], 404);
        }
    
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
    
        $activities->update($validatedData);
    
        return response()->json(['message' => 'Record updated successfully', 'data' => $activities], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activities = Activities::find($id);
    
        if (!$activities) {
            return response()->json(['message' => 'Record not found'], 404);
        }
    
        $activities->delete();
    
        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
