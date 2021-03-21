<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\BankAccounts as Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{

    public function index()
    {
        return view('app');
    }

    public function read_accounts()
    {
        $accounts = Accounts::select('*')->paginate(10);
        return response()->json($accounts, 200);
    }

    public function view_account($id)
    {
        $account = Accounts::where('id', $id)->get();
        return response()->json($account, 200);
    }
}
