<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('account')->group(function () {
	Route::get('', 'AccountController@index');
	Route::post('deposit', 'AccountController@deposit');
	Route::post('withdraw', 'AccountController@withdraw');
});
