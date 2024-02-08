<?php

namespace App\Http\Controllers;

use App\Models\PaymentAccount;
use Exception;
use Illuminate\Http\Request;
use Validator;

class PaymentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentAccounts = PaymentAccount::paginate(50);

        return response()->json($paymentAccounts, 200);
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
    public function show(int $paymentAccount)
    {
        $checkout = PaymentAccount::find($paymentAccount);

        if(!$checkout){
            return response()->json(
                [
                    'message'=>'Payment Account not found'
                ], 404
            );
        }
        return response()->json(['data'=>$checkout]);
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
        $validator = Validator::make($request->all(), [
            'number' => 'nullable',
            'BIC' => 'nullable',
            'сorrespondent_account' => 'nullable', 
            'comments' => 'nullable',
            'status' => 'nullable',
            'owner_id' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $input = $request->all();
    
        try {
            $existingPaymentAccount = PaymentAccount::find($paymentAccount);
            if ($existingPaymentAccount && $existingPaymentAccount->id !== $paymentAccount->id) {
                return response()->json(['status' => 'This owner already has a payment account.'], 403);
            }
    
            $paymentAccount->update($input);
    
            return response()->json(['data' => $paymentAccount], 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $paymentAccount)
    {

        $paymentAccount = PaymentAccount::find($paymentAccount);

        if (!$paymentAccount) {
            return response()->json(['error' => 'Payment account not found'], 404);
        }

        $paymentAccount->delete();

        return response()->json(['message' => 'Payment account deleted successfully'], 200);
    }

}
