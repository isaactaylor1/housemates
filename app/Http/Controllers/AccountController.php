<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function deposit(Request $request)
    {
        return $request;
    }

    public function withdraw(Request $request)
    {
        return $request;
    }
}
