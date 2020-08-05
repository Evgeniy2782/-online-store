<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('shop')->group(function (){


Route::post('/product/add-to-cart', 'ShopCartController@addToCart')->name('add-to-cart');
    
Route::get('product/{id}', 'ShopController@profileProduct')->name('apiProduct');
Route::get('product/{id}/view', 'ShopController@profileProductJson')->name('apiProductJson');
Route::get('categories', 'ShopController@categories')->name('categories-list');
Route::get('category/{name}', 'ShopController@apiCategory')->name('apiCategory');
Route::get('/category/{name}/view', 'ShopController@apiCategoryJson')->name('apiCategoryJson');

});


