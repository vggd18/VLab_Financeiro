<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function create(Request $request, Transaction $transaction)
    {
        $data = $request->all();
        $transaction = $transaction->create($data);

        if (!$transaction) {
            return back()->json(['message' => 'Transaction creation failed'], 500);
        }
        return response()->json(['message' => 'Transaction created successfully'], 201);
    }

    public function remove(string|int $id)
    {
        if(!$transaction = Transaction::find($id)){
            
            return back()->json(['message' => 'Transaction remove failed'], 500);
        }

        $transaction->delete();
        
        return response()->json(['message' => 'Transaction removed successfully'], 200);
    }
}
