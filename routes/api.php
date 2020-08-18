<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth.jwt'] , function(){
    
    Route::get('logout','Api\Auth\LoginController@logout');
    Route::get('/get', 'Api\TicketController@get');
    Route::get('/cities', 'Api\CityController@cities');
    Route::get('/tickets', 'Api\TicketController@index');
    Route::get('/companies', 'Api\CompanyController@companies');
    Route::resource('orders', 'Api\OrderController')->only(['store','show','destroy']);
    Route::get('order/all/{id}', 'Api\OrderController@all');
    Route::put('/users/{id}/edit', 'Api\UserController@update');
});

//Auth
Route::post('/login', 'Api\Auth\LoginController@login');
Route::post('/register', 'Api\Auth\RegisterController@register');
