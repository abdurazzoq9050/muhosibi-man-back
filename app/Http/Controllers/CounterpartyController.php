<?php

namespace App\Http\Controllers;

use App\Models\Counterparty;
use Illuminate\Http\Request;

class CounterpartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all records from the database
        $records = Counterparty::all();

        // Optionally, you can return a response with the retrieved records
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
         // Validate incoming request data
         $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50',
            'legal_address' => 'required|string|max:255',
            'physic_address' => 'required|string|max:255',
            'site' => 'nullable|string|max:255',
            'inn' => 'required|integer',
            'kpp' => 'required|integer',
            'contacts' => 'nullable|json',
            'for_sign_docs' => 'nullable|json',
            'by_person' => 'nullable|json',
            'passport_details' => 'nullable|json',
            'comment' => 'nullable|json',
            'payment_method' => 'nullable|string|max:50',
        ]);

        $newRecord = Counterparty::create($validatedData);

        // Optionally, you can return a response with the created record
        return response()->json(['message' => 'Record created successfully', 'data' => $newRecord], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Counterparty $counterparty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counterparty $counterparty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = Counterparty::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'full_name' => 'string|max:255',
            'short_name' => 'string|max:50',
            'legal_address' => 'string|max:255',
            'physic_address' => 'string|max:255',
            'site' => 'nullable|string|max:255',
            'inn' => 'integer',
            'kpp' => 'integer',
            'contacts' => 'nullable|json',
            'for_sign_docs' => 'nullable|json',
            'by_person' => 'nullable|json',
            'passport_details' => 'nullable|json',
            'comment' => 'nullable|json',
            'payment_method' => 'nullable|string|max:50',
        ]);

        $record->update($validatedData);

        return response()->json(['message' => 'Record updated successfully', 'data' => $record], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = Counterparty::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $record->delete();

        return response()->json(['message' => 'Record deleted successfully'], 200);
    }
}
