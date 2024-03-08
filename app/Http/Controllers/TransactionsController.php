<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Validator;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transactions::all();

        return response()->json($transactions);
    }

    public function show($id)
    {
        $transaction = Transactions::with(['sender', 'taker', 'paymentAccount'])->find($id);
    
        if(is_null($transaction)){
            return response()->json(
                [ 
                    'status' => 'Transaction not found.'
                ],
                404
            );
        }
    
        return response()->json($transaction);
    }
    
    

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'details' => 'required',
            'total' => 'required',
            'total_tax' => 'required',
            'sender' => 'required',
            'taker' => 'required',
            'payment' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation' => $validator->errors()]);       
        }

        $transaction = Transactions::create($request->all());

        return response()->json($transaction, 201);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transactions::find($id);

        if (is_null($transaction)) {
            return response()->json(['error' => 'Transactions not found'], 404);
        }

        $input = $request->all();
        
        $transaction->update($input);

        return response()->json($transaction, 200);
    }

    public function destroy($id)
    {
        $transaction = Transactions::findOrFail($id);

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully'], 200);
    }
}
