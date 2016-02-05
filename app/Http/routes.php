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

//Padroniza a variavel ID a ser somente número, para não precisar ficar usando o where
Route::pattern('id', '[0-9]+');

Route::get('/', function(){
    return redirect()->route('store.index');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', ['as' => 'login', 'uses' => function () {
            return view('store.login');
        }]);
    Route::get('register', ['as' => 'register', 'uses' => function () {
            return view('store.register');
        }]);
    Route::get('logout', ['as' => 'logout', 'uses' => function () {
        Auth::logout();
        return redirect()->route('store.index');
    }]);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test' => 'TestController'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'adminAuth'], function () {

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/{id?}', ['as' => 'show', 'uses' => 'AdminCategoriesController@show']);
        Route::get('/create', ['as' => 'create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('/store', ['as' => 'store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('/update/{id}', ['as' => 'update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminCategoriesController@destroy']);
    });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'AdminProductsController@index']);
        Route::get('/{id?}', ['as' => 'show', 'uses' => 'AdminProductsController@show']);
        Route::get('/create', ['as' => 'create', 'uses' => 'AdminProductsController@create']);
        Route::post('/store', ['as' => 'store', 'uses' => 'AdminProductsController@store']);
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('/update/{id}', ['as' => 'update', 'uses' => 'AdminProductsController@update']);
        Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminProductsController@destroy']);

        Route::group(['prefix' => 'images', 'as' => 'images.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}', ['as' => 'store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });
    });
    Route::get('/', ['as' => 'admin.index', 'uses' => function () {
        return view('home');
    }]);
});

Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/{id}', ['as' => 'products', 'uses' => 'StoreController@listProductsCategory']);
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/{id}', ['as' => 'detail', 'uses' => 'StoreController@ProductDetails']);
        Route::get('tag/{id}', ['as' => 'tag', 'uses' => 'StoreController@listProductsTags']);
    });

    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CartController@index']);
        Route::get('/add/{id}/{qtd}', ['as' => 'add', 'uses' => 'CartController@add']);
        Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'CartController@destroy']);
    });

    Route::group(['prefix' => 'checkout',  'middleware' => 'auth', 'as' => 'checkout.'], function () {
        Route::get('/placeOrder', ['as' => 'place', 'uses' => 'CheckoutController@place']);
    });

    Route::get('/', ['as' => 'index', 'uses' => 'StoreController@index']);
});

Route::get('home', 'StoreController@index');