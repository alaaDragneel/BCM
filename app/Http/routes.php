<?php

/**********************************************************************************************************
** start globals Routes
/**********************************************************************************************************/
// index view
Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::auth();

/**********************************************************************************************************
** end globals Routes
/**********************************************************************************************************/

/**********************************************************************************************************
** start admin Routes
/**********************************************************************************************************/
// group the routes by Admin middleWare
Route::group(['middleware' => 'admin'], function () {
  // add Admin Prefix
  Route::group(['prefix' => '/admin'], function() {

    // admin DashBoard
    Route::get('/', [
      'uses' => 'adminController@getIndex',
      'as' => 'admin.dashboard'
    ]);

  });
});
/**********************************************************************************************************
** end admin Routes
/**********************************************************************************************************/

/**********************************************************************************************************
** start users Routes
/**********************************************************************************************************/
// group the routes by the users middleWare
Route::group(['middleWare' => 'users'] , function () {
     // add users prefix
     Route::group(['prefix' => 'users'], function () {
          // index view
          Route::get('/dashboard', [
               'uses' => 'HomeController@index',
               'as' => 'user.dashboard'
          ]);

          // teamworks view
          Route::get('/teamworks/view', [
               'uses' => 'HomeController@getTeamWork',
               'as' => 'teamworks'
          ]);

          // teamworks add
          // Route::get('/teamworks/view/create', [
          //      'uses' => 'HomeController@getNewMember',
          //      'as' => 'create.member'
          // ]);

          // teamworks add
          Route::post('/teamworks/view/store', [
               'uses' => 'HomeController@NewMember',
               'as' => 'create.member'
          ]);


     });
});

/**********************************************************************************************************
** end users Routes
/**********************************************************************************************************/

/**********************************************************************************************************
** start BMC Routes
/**********************************************************************************************************/


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

// searchCompaniesCountry
Route::get('/getCompanies', [
    'uses'  =>  'ProSearchController@getAjaxCompanies',
    'as'    =>  'Companies'
]);

/**********************************************************************************************************
** end BMC Routes
/**********************************************************************************************************/
