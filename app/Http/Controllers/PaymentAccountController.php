<?php

namespace App\Http\Controllers;

use App\Models\PaymentAccount;
use Illuminate\Http\Request;
use Validator;

class PaymentAccountController extends Controller
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
            'number'=>'required',
            'BIC'=>'required',
            'сorrespondent_account'=>'required', 
            'comments'=>'required',
            'status'=>'required',
            'owner_id'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $input = $request->all();

        $checkout = PaymentAccount::where('owner_id',$input['owner_id'])->first();

        if(is_null($checkout)){
            $payment = PaymentAccount::create($input);
            
            return response()->json(['data'=>$payment], 201);

        }else{
            return response()->json(
                [ 
                    'status' => 'This owner already has a payment account.'
                ],
                403
            );
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentAccount $paymentAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentAccount $paymentAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentAccount $paymentAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentAccount $paymentAccount)
    {
        //
    }
}
