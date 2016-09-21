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

Route::group(['middleware' => 'apiCustom'], function (){
  //Comments
  Route::get('/get-comments', [
    'as'			=> 'comments.get',
    'uses'		=> '\App\Http\Controllers\Api\CommentsController@get'
  ]);

  Route::get('/comments/{postId}', [
    'as'			=> 'comments.getByPost',
    'uses'		=> '\App\Http\Controllers\Api\CommentsController@getByPost'
  ]);

  Route::post('/comments', [
    'as'			=> 'comments.post',
    'uses'		=> '\App\Http\Controllers\Api\CommentsController@store'
  ]);

  Route::put('/comments/{id}', [
    'as'			=> 'comments.put',
    'uses'		=> '\App\Http\Controllers\Api\CommentsController@update'
  ]);

  Route::delete('/comments/{id}', [
    'as'			=> 'comments.delete',
    'uses'		=> '\App\Http\Controllers\Api\CommentsController@delete'
  ]);
});
