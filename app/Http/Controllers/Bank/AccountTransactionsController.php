<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\BankAccounts as Account;
use App\Models\BankAccountTransactions as Transaction;
use Illuminate\Http\Request;

class AccountTransactionsController extends Controller
{

    public function make_transaction(PostRequest $request, $id)
    {
        $account = Account::where('id', $id)->firstOrFail();
        if ($request->type == 1) {
            $new_current_balance = $account->current_balance + $request->value;
            $transaction = (new Transaction())->createTransaction($request, $id);
            $account->update([
                'current_balance' => $new_current_balance,
            ]);
            return response()->json([
                'message' => 'transaction successful'
            ], 201);
        }
        $new_current_balance = (int) $account->current_balance - $request->value;
        if ($new_current_balance < 0) {
            return response()->json([
                'message' => 'you dont have sufficient funds to withdraw that ammount'
            ], 422);
        }
        $transaction = (new Transaction())->createTransaction($request, $id);
        $account->update([
            'current_balance' => $new_current_balance,
        ]);
        return response()->json([
            'message' => 'transaction successful'
        ], 201);
    }

    public function read_transactions($id)
    {
        $transactions = Transaction::where('account_id', $id)
            ->orderBy('created_at', 'desc')
            ->select('*')
            ->paginate(10);
        return response()->json($transactions, 200);
    }
}
