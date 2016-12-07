<?php

/**********************************************************************************************************
** start globals Routes
/**********************************************************************************************************/
// index view
Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::auth();

Route::get('/redirect/{provider}', [
  'uses' => 'SocialAuthController@redirectFaceBook',
  'as' => 'redirect.facebook'
]);

Route::get('/callback/{provider}', [
  'uses' => 'SocialAuthController@callbackFaceBook',
  'as' => 'callback.facebook'
]);

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
    Route::get('/dashboard', [
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
  Route::group(['prefix' => 'users'], function () {
    // register info profile view
    Route::get('/profileInfo', [
      'uses' => 'HomeController@register_profile',
      'as' => 'register.info'
    ]);
    Route::post('/profileInfo/update', [
      'uses' => 'HomeController@register_profile_update',
      'as' => 'register.info.update'
    ]);
  Route::group(['middleware' => 'users'] , function () {
    // index view
    Route::get('/dashboard', [
      'uses' => 'HomeController@index',
      'as' => 'dashboard'
    ]);
    // index view
    Route::get('/logs', [
      'uses' => 'HomeController@logs',
      'as' => 'logs'
    ]);

  // profile view
  Route::get('/profile', [
    'uses' => 'HomeController@profile',
    'as' => 'profile'
  ]);
  // profile view
  Route::post('/profile/update', [
    'uses' => 'HomeController@profile_update',
    'as' => 'profile.update'
  ]);
  // profile view
  Route::post('/info/update', [
    'uses' => 'HomeController@info_update',
    'as' => 'info.update'
  ]);

    // teamworks view
    Route::get('/teamworks/view', [
    'uses' => 'HomeController@getTeamWork',
    'as' => 'teamworks'
    ]);

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

    // searchBtn KP
    Route::post('/getrequest', [
    'uses'  =>  'ProSearchController@AjaxBtnResults',
    'as'    =>  'request'
    ]);


    // searchCompaniesCountry
    Route::get('/governorates', [
    'uses'  =>  'ProSearchController@getAjaxGovernorates',
    'as'    =>  'governorates'
    ]);
    // searchCompaniesCountry
    Route::get('/cities', [
    'uses'  =>  'ProSearchController@getAjaxCities',
    'as'    =>  'cities'
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
    // update canvas
    Route::post('/canvas/update', [
    'uses' => 'HomeController@postCanvasUpdate',
    'as' => 'update.canvas'
    ]);
    // update canvas
    Route::get('/canvas/delete', [
    'uses' => 'HomeController@CanvasDelete',
    'as' => 'delete.canvas'
    ]);

    // get canvas
    Route::get('/canvas/view/{canvas_id}', [
    'uses' => 'bmcCanvasController@getCanvas',
    'as' => 'view.canvas'
    ]);

    // store KP canvas
    Route::post('/canvas/view/KP/store', [
    'uses' => 'bmcCanvasController@postKP',
    'as' => 'KP.store'
    ]);

    // delete KP canvas
    Route::get('/canvas/view/KP/delete', [
    'uses' => 'bmcCanvasController@getDeleteKP',
    'as' => 'request.delete'
    ]);


    // response KA canvas
    Route::get('/canvas/view/KA/responseTeamWork', [
    'uses' => 'bmcCanvasController@getTeamWork',
    'as' => 'KA.response'
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
    // update KA canvas
    Route::post('/canvas/view/KA/update', [
    'uses' => 'bmcCanvasController@UpdateKA',
    'as' => 'KA.update'
    ]);

    // store VP canvas
    Route::post('/canvas/view/VP/store', [
    'uses' => 'bmcCanvasController@postVP',
    'as' => 'VP.store'
    ]);
    // delete VP canvas
    Route::get('/canvas/view/VP/delete', [
    'uses' => 'bmcCanvasController@getDeleteVP',
    'as' => 'VP.delete'
    ]);
    // update VP canvas
    Route::post('/canvas/view/VP/update', [
    'uses' => 'bmcCanvasController@UpdateVP',
    'as' => 'VP.update'
    ]);
    // store CR canvas
    Route::post('/canvas/view/CR/store', [
    'uses' => 'bmcCanvasController@postCR',
    'as' => 'CR.store'
    ]);
    // delete CR canvas
    Route::get('/canvas/view/CR/delete', [
    'uses' => 'bmcCanvasController@getDeleteCR',
    'as' => 'CR.delete'
    ]);
    // update CR canvas
    Route::post('/canvas/view/CR/update', [
    'uses' => 'bmcCanvasController@UpdateCR',
    'as' => 'CR.update'
    ]);
    // store KR canvas
    Route::post('/canvas/view/KR/store', [
    'uses' => 'bmcCanvasController@postKR',
    'as' => 'KR.store'
    ]);
    // delete KR canvas
    Route::get('/canvas/view/KR/delete', [
    'uses' => 'bmcCanvasController@getDeleteKR',
    'as' => 'KR.delete'
    ]);
    // update KR canvas
    Route::post('/canvas/view/KR/update', [
    'uses' => 'bmcCanvasController@UpdateKR',
    'as' => 'KR.update'
    ]);
    // store CH canvas
    Route::post('/canvas/view/CH/store', [
    'uses' => 'bmcCanvasController@postCH',
    'as' => 'CH.store'
    ]);
    // delete CH canvas
    Route::get('/canvas/view/CH/delete', [
    'uses' => 'bmcCanvasController@getDeleteCH',
    'as' => 'CH.delete'
    ]);
    // update CH canvas
    Route::post('/canvas/view/CH/update', [
    'uses' => 'bmcCanvasController@UpdateCH',
    'as' => 'CH.update'
    ]);
    // store CS canvas
    Route::post('/canvas/view/CS/store', [
    'uses' => 'bmcCanvasController@postCS',
    'as' => 'CS.store'
    ]);
    // delete CS canvas
    Route::get('/canvas/view/CS/delete', [
    'uses' => 'bmcCanvasController@getDeleteCS',
    'as' => 'CS.delete'
    ]);
    // update CS canvas
    Route::post('/canvas/view/CS/update', [
    'uses' => 'bmcCanvasController@UpdateCS',
    'as' => 'CS.update'
    ]);
    // store CST canvas
    Route::post('/canvas/view/CST/store', [
    'uses' => 'bmcCanvasController@postCST',
    'as' => 'CST.store'
    ]);
    // delete CST canvas
    Route::get('/canvas/view/CST/delete', [
    'uses' => 'bmcCanvasController@getDeleteCST',
    'as' => 'CST.delete'
    ]);
    // update CST canvas
    Route::post('/canvas/view/CST/update', [
    'uses' => 'bmcCanvasController@UpdateCST',
    'as' => 'CST.update'
    ]);
    // store RS canvas
    Route::post('/canvas/view/RS/store', [
    'uses' => 'bmcCanvasController@postRS',
    'as' => 'RS.store'
    ]);
    // delete RS canvas
    Route::get('/canvas/view/RS/delete', [
    'uses' => 'bmcCanvasController@getDeleteRS',
    'as' => 'RS.delete'
    ]);
    // update RS canvas
    Route::post('/canvas/view/RS/update', [
    'uses' => 'bmcCanvasController@UpdateRS',
    'as' => 'RS.update'
    ]);
    /**********************************************************************************************************
    ** end BMC Routes
    /**********************************************************************************************************/

  });
});

/**********************************************************************************************************
** end users Routes
/**********************************************************************************************************/
