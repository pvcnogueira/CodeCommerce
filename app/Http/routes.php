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

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'categories', 'AdminCategoriesController@index']);
        Route::get('/{id?}', ['as' => 'category', 'AdminCategoriesController@show']);
        Route::get('/create', ['as' => 'createCategory', 'AdminCategoriesController@create']);
        Route::post('/save', ['as' => 'saveCategory', 'AdminCategoriesController@store']);
        Route::get('/edit/{id?}', ['as' => 'editCategory', 'AdminCategoriesController@edit']);
        Route::post('/update/{id?}', ['as' => 'updateCategory', 'AdminCategoriesController@update']);
        Route::get('/delete/{id?}', ['as' => 'deleteCategory', 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', ['as' => 'products', 'AdminProductsController@index']);
        Route::get('/{id?}', ['as' => 'product', 'AdminProductsController@show']);
        Route::get('/create', ['as' => 'createProduct', 'AdminProductsController@create']);
        Route::post('/save', ['as' => 'saveProduct', 'AdminProductsController@store']);
        Route::get('/edit/{id?}', ['as' => 'editProduct', 'AdminProductsController@edit']);
        Route::post('/update/{id?}', ['as' => 'updateProduct', 'AdminProductsController@update']);
        Route::get('/delete/{id?}', ['as' => 'deleteProduct', 'AdminProductsController@destroy']);
    });
});
