<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('ticket', 'HomeController@create')->name('ticket-create');
Route::get('/ticket/new', 'HomeController@new')->name('new-ticket');
Route::get('/ticket/index', 'HomeController@list')->name('index-ticket');
Route::get('/ticket/show/{ticket}', 'HomeController@show')->name('show-ticket');
Route::get('/ticket/take/{ticket}', 'HomeController@take')->name('take-ticket');
Route::delete('/ticket/{ticket}', 'HomeController@delet')->name('ticket-delet');
Route::get('/ticket/solicitados', 'HomeController@my_list')->name('my-tickets');

Route::get('/user/new', 'UserController@new')->name('new-user');
Route::get('/users/index', 'UserController@index')->name('index-user');
Route::get('/users/user/{user}', 'UserController@show')->name('see-user');
Route::post('/user/create', 'UserController@create')->name('user-create');
