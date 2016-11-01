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
Route::group(['middleware' => 'usersCompany'] , function () {
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

          // #datatable ajax
          //
          // Route::get('/teamworks/view/members', [
          //      'uses' => 'HomeController@getTeamWorkData',
          //      'as' => 'teamworks.data'
          // ]);
          //

          // teamworks add
          Route::post('/teamworks/view/store', [
               'uses' => 'HomeController@NewMember',
               'as' => 'create.member'
          ]);

          // teamworks edit
          Route::post('/teamworks/view/update', [
               'uses' => 'HomeController@editMember',
               'as' => 'edit.member'
          ]);

          // teamworks delete
          Route::get('/teamworks/view/delete/', [
               'uses' => 'HomeController@getTeamWorkDelete',
               'as' => 'delete.member'
          ]);
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

          // projects view
          Route::get('/projects/view/', [
            'uses' => 'HomeController@getProjects',
            'as' => 'projects'
          ]);

          // create projects view
          Route::get('/canvas/create', [
               'uses' => 'HomeController@getCreateProjects',
               'as' => 'create.projects'
             ]);

          // create projects info view
          Route::get('/canvas/create/mainInfo', [
               'uses' => 'HomeController@getCreateInfoProjects',
               'as' => 'createInfo.projects'
             ]);

          // store canvas
          Route::post('/canvas/store', [
               'uses' => 'HomeController@postCanvasStore',
               'as' => 'store.canvas'
             ]);

          // get canvas
          Route::get('/canvas/view/{canvas_id}', [
               'uses' => 'bmcCanvasController@getCanvas',
               'as' => 'view.canvas'
             ]);

          // store KA canvas
            Route::post('/canvas/view/KA/store', [
               'uses' => 'bmcCanvasController@postKA',
               'as' => 'KA.store'
             ]);
          // delete KA canvas
            Route::get('/canvas/view/KA/delete', [
               'uses' => 'bmcCanvasController@getDeleteKA',
               'as' => 'KA.delete'
             ]);
/**********************************************************************************************************
** end BMC Routes
/**********************************************************************************************************/

     });
});

/**********************************************************************************************************
** end users Routes
/**********************************************************************************************************/
