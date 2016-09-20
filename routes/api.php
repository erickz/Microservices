<?php

use Illuminate\Http\Request;

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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::group(['middleware' => 'auth:api'], function (){
  //Comments
  Route::get('/comments', [
    'as'			=> 'comments.get',
    'uses'		=> '\App\Http\Controllers\CommentsController@get'
  ]);

  Route::post('/comments', [
    'as'			=> 'comments.post',
    'uses'		=> '\App\Http\Controllers\CommentsController@store'
  ]);

  Route::put('/comments/{id}', [
    'as'			=> 'comments.put',
    'uses'		=> '\App\Http\Controllers\CommentsController@update'
  ]);

  Route::delete('/comments/{id}', [
    'as'			=> 'comments.delete',
    'uses'		=> '\App\Http\Controllers\CommentsController@delete'
  ]);
});
