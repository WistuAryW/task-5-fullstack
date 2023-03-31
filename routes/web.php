<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\UserController;

Route::group(['middleware' => ['auth:api']], function (){
    Route::get('/user', [UserController::class, 'profile']);
    Route::patch('/user', [UserController::class, 'patch']);
    Route::post('/user/logout','UserController@logout')->name('logout');
    Route::post('/user/delete', [UserController::class, 'delete']);
});

Route::get('/','UserController@index')->name('index');
Route::get('/formRegister', 'UserController@formRegister')->name('formRegister');
Route::post('/register','UserController@register')->name('register');
Route::get('/formLogin', 'UserController@formLogin')->name('formLogin');
Route::post('/login','UserController@login')->name('login');
Route::post('/user/logout','UserController@logout')->name('logout');




//articels
Route::get('/','ArticelController@beranda')->name('beranda');
Route::get('/articel','ArticelController@index')->name('index');
Route::get('/create','ArticelController@create')->name('create');
Route::post('store/','ArticelController@store')->name('store');
Route::get('show/{articel}', 'ArticelController@show')->name('show');
Route::get('edit/{articel}', 'ArticelController@edit')->name('edit');
Route::put('edit/{articel}','ArticelController@update')->name('update');
Route::delete('/{articel}','ArticelController@destroy')->name('destroy');