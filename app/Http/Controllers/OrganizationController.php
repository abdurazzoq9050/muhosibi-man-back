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
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
