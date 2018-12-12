<?php

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: *' );
header( 'Access-Control-Allow-Methods: *');

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

Route::resource('article','ArticleController'); 
Route::resource('user', 'UserController'); 
Route::resource('categoria','CategoriaController');
Route::get('/user/{user}/articles','UserController@showArticles');
Route::get('/categoria/{categoria}/articles', 'CategoriaController@getArticles'); 
Route::get('categorias/{categoria}', 'CategoriaController@show');


