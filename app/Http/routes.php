<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('BMC');
});


// search
Route::get('/getresults', [
    'uses'  =>  'ProSearchController@getAjaxResults',
    'as'    =>  'results'
]);

// searchBtn
Route::get('/getrequest', [
    'uses'  =>  'ProSearchController@getAjaxBtnResults',
    'as'    =>  'request'
]);
