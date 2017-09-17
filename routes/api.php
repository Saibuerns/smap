<?php
//use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('users/login', 'auth\\UserController@login');
        Route::resource('users', 'auth\\UserController', ['only' => ['index', 'store', 'show']]);
        Route::resource('rols', 'auth\\RolController', ['only' => ['index', 'store', 'show']]);
        Route::resource('abilities', 'auth\\AbilityController', ['only' => ['index', 'store', 'show']]);
    });
    Route::group(['prefix' => 'events'], function () {
        Route::resource('types', 'EventTypeController', ['only' => ['index', 'store', 'show']]);
        Route::post('/', 'EventController@store');
        Route::get('/', 'EventController@index');
        Route::get('/{id}', 'EventController@show');
        Route::get('/date/{date}', 'EventController@findByDate');
        Route::get('/name/{name}', 'EventController@findByName');        
    });
});


