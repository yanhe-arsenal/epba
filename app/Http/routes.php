<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');


    Route::get('/epba_card_requests', 'Epba_card_requestController@index');
    Route::post('/epba_card_request', 'Epba_card_requestController@store');
    Route::delete('/epba_card_request/{epba_card_request}', 'Epba_card_requestController@destroy');
    Route::auth();
    
    Route::get('/epba_card_generation/{request_ID}', function () {
        return view('epba_cards.index', ['request_id' => $squirrel]));
    })->middleware('guest');
 
    Route::post('/epba_card', 'Epba_cardController@store');
    Route::get('/pdf', 'Epba_card_requestController@invoice');
});
