<?php

namespace App\Http\Controllers;

use App\Models\DocumentsType;
use Illuminate\Http\Request;
use Validator;

class DocumentsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all documents types from the 'documents_types' table
        $documentTypes = DocumentsType::all();

        // Optionally, you can return a JSON response with the retrieved document types
        return response()->json(['data' => $documentTypes], 200);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'metatag' => 'nullable|json',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => $validator->errors()]);
        }

        // Create a new documents type
        $documentsType = DocumentsType::create($request->all());

        // Return a JSON response with the created documents type
        return response()->json(['data' => $documentsType], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the document type by ID
        $documentType = DocumentsType::find($id);

        // Check if the document type exists
        if (!$documentType) {
            return response()->json(['message' => 'Document type not found'], 404);
        }

        // Return a JSON response with the retrieved document type
        return response()->json(['data' => $documentType], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentsType $documentsType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentsType $documentsType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the document type by ID
        $documentType = DocumentsType::find($id);

        // Check if the document type exists
        if (!$documentType) {
            return response()->json(['message' => 'Document type not found'], 404);
        }

        // Delete the document type
        $documentType->delete();

        // Optionally, you can return a response with a success message
        return response()->json(['message' => 'Document type deleted successfully'], 200);
    }
}
