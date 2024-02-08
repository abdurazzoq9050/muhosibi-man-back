<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Validator;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all documents from the 'documents' table
        $documents = Documents::paginate(50);

        // Optionally, you can return a JSON response with the retrieved documents
        return response()->json($documents, 200);
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
            'template' => 'required|string',
            'metatag' => 'nullable|json',
            'doc_type' => 'required',
            'with_sign_seal' => 'boolean',
            'public' => 'boolean',
            'sum' => 'numeric',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => $validator->errors()]);
        }

        // Create a new document
        $document = Documents::create($request->all());

        // Return a JSON response with the created document
        return response()->json(['data' => $document], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $documentId)
    {
        $documents = Documents::find($documentId);

        if(!$documents){
            return response()->json(
                [
                    'message'=>"Document not found"
                ], 404
            );
        }

        return response()->json(
            [
                'data'=>$documents
            ]
            );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'template' => 'string',
            'metatag' => 'nullable|json',
            'with_sign_seal' => 'boolean',
            'public' => 'boolean',
            'sum' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => $validator->errors()]);
        }

        // Find the document by ID
        $document = Documents::find($id);

        // Check if the document exists
        if (!$document) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        // Update the document with the validated data
        $document->update($request->all());

        // Optionally, you can return a response with the updated document
        return response()->json(['message' => 'Document updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the document by ID
        $document = Documents::find($id);

        // Check if the document exists
        if (!$document) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        // Delete the document
        $document->delete();

        // Optionally, you can return a response with a success message
        return response()->json(['message' => 'Document deleted successfully'], 200);
    }
}
