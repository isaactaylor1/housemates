<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('accounts-list', 'Bank\AccountsController@index');

Route::prefix('accounts')->group(function () {
    Route::get('', 'Bank\AccountsController@read_accounts');
    Route::get('{id}', 'Bank\AccountsController@view_account');

    Route::prefix('transactions')->group(function () {
        Route::post('deposit/{id}', 'Bank\AccountTransactionsController@make_transaction');
        Route::get('read/{id}', 'Bank\AccountTransactionsController@read_transactions');
    });
});
