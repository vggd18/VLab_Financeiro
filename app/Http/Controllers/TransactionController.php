<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    //
    public function create(Request $request, Transaction $transaction, User $user)
    {
        if(!Gate::allows('create-transaction', $user)){
            abort(403);
        }

        $data = $request->post();
        $transaction = $transaction->create($data);

        if (!$transaction) {
            return back()->json(['message' => 'Transaction creation failed'], 500);
        }
        return response()->json(['message' => 'Transaction created successfuly'], 200);
    }

    public function remove(string|int $id, User $user)
    {
        if(!Gate::allows('delete-transaction', $user)){
            abort(403);
        }

        if(!$transaction = Transaction::find($id)){
            
            return back()->json(['message' => 'Transaction remove failed'], 501);
        }

        $transaction->delete();
        
        return response()->json(['message' => 'Transaction removed successfuly'], 200);
    }

    public function show(User $user)
    {
        if(!Gate::allows('viewAny-transaction', $user)){
            abort(403);
        }
        $transaction = Transaction::all();

        return response()->json($transaction);
    }

    public function filter(Request $req, User $user)
    {   
        if(!Gate::allows('viewAny-transaction', $user)){
            abort(403);
        }
        $column = $req->column;
        $value = $req->value;

        $transaction = DB::table('transactions')->where($column, '=', $value)->get();

        return response()->json($transaction);
    }
}
