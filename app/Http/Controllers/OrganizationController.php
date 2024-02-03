<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Organization;
use Illuminate\Http\Request;
use Validator;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Retrieve all organizations from the 'organizations' table
          $organizations = Organization::all();

          // Optionally, you can return a JSON response with the retrieved organizations
          return response()->json(['data' => $organizations], 200);
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
            'title' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'inn' => 'required',
            'kpp' => 'required',
            'tax_system' => 'required',
            'legal_address' => 'required',
            'physic_address' => 'required',
            'type' => 'required',
            'contacts' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation' => $validator->errors()]);       
        }

        $input = $request->all();
        
        $chekout = Organization::where('email',$input['email'])->orWhere('phone', $input['phone'])->first();
        if(is_null($chekout)){

            $organization = Organization::create($input);

            if( is_string($input['activities']) && strpos($input['activities'], ',') !== false){
                $arr = explode(',',$input['activities']);
                foreach($arr as $item){
                    // $organization->activities()->sync($item);
                    $organization->activities()->attach($item);
                }
            }else{
                $organization->activities()->sync($input['activities']);
            }

            return response()->json($organization,200);

        }else{
            return response()->json(
                [ 
                    'status' => 'Duplicate (phone or email) organization on register.'
                ],
                409
            );
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'inn' => 'nullable|string|max:12',
            'kpp' => 'nullable|string|max:9',
            'tax_system' => 'nullable|string|max:255',
            'legal_address' => 'nullable|string',
            'physic_address' => 'nullable|string',
            'type' => 'nullable|string|max:255',
            'contacts' => 'nullable|json',
            'status' => 'nullable|string|max:255',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => $validator->errors()]);
        }

        // Find the organization by ID
        $organization = Organization::find($id);

        // Check if the organization exists
        if (!$organization) {
            return response()->json(['message' => 'Organization not found'], 404);
        }

        // Your custom condition (replace this with your specific condition)
        if ($organization->status === 'active') {
            // Update the organization with the validated data
            $organization->update($request->all());

            // Optionally, you can return a response with the updated organization
            return response()->json(['message' => 'Organization updated successfully', 'data' => $organization], 200);
        } else {
            return response()->json(['message' => 'Organization cannot be updated due to a specific condition'], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the organization by ID
        $organization = Organization::find($id);

        // Check if the organization exists
        if (!$organization) {
            return response()->json(['message' => 'Organization not found'], 404);
        }

        // Delete the organization
        $organization->delete();

        // Optionally, you can return a response with a success message
        return response()->json(['message' => 'Organization deleted successfully'], 200);
    }
}
