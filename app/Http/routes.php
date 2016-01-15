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


Route::pattern('id', '[0-9]+'); //Padroniza a variavel ID a ser somente número, para não precisar ficar usando o where


Route::get('/', 'WelcomeController@index');
Route::get('exemplo', 'WelcomeController@exemplo');

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/{id?}', ['as' => 'show',  'uses' => 'AdminCategoriesController@show']);
        Route::get('/create', ['as' => 'create',  'uses' => 'AdminCategoriesController@create']);
        Route::post('/store', ['as' => 'store',  'uses' => 'AdminCategoriesController@store']);
        Route::get('/edit/{id?}', ['as' => 'edit',  'uses' => 'AdminCategoriesController@edit']);
        Route::put('/update/{id?}', ['as' => 'update',  'uses' => 'AdminCategoriesController@update']);
        Route::get('/destroy/{id?}', ['as' => 'destroy',  'uses' => 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', ['as' => 'index',  'uses' => 'AdminProductsController@index']);
        Route::get('/{id?}', ['as' => 'show',  'uses' => 'AdminProductsController@show']);
        Route::get('/create', ['as' => 'create',  'uses' => 'AdminProductsController@create']);
        Route::post('/store', ['as' => 'store',  'uses' => 'AdminProductsController@store']);
        Route::get('/edit/{id?}', ['as' => 'edit',  'uses' => 'AdminProductsController@edit']);
        Route::put('/update/{id?}', ['as' => 'update',  'uses' => 'AdminProductsController@update']);
        Route::get('/destroy/{id?}', ['as' => 'destroy',  'uses' => 'AdminProductsController@destroy']);
    });
});
