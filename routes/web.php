<?php
use Illuminate\Support\Facades\Route;

Auth::routes([
    //'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);


Route::get('/', 'ShopController@index')->name('shop');
Route::get('/new-category', 'ShopController@category')->name('new-category');
Route::get('/new-product', 'ShopController@product')->name('new-product');
Route::get('/products/view', 'ShopController@viewEditProducts')->name('view-edit-products');
Route::get('/users/view', 'UserProfileController@viewEditUsers')->name('view-edit-users');
Route::get('/user/view/{id}', 'UserProfileController@profileEditeUser')->name('view-edit-user');
Route::patch('/edit-user/{id}', 'UserEditController@editUser')->name('edit-user');
Route::get('/categories/view', 'ShopController@viewEditCategories')->name('view-edit-categories');
Route::get('/categories/category/{id}', 'ShopController@viewEditCategory')->name('view-edit-category');
Route::patch('/categories/edit-category/{id}', 'ShopFormsController@editCategory')->name('edit-category');
Route::get('/product/edit/{id}', 'ShopController@viewEditProduct')->name('view-edit-product');
Route::patch('/product/edit-product/{id}', 'ShopFormsController@editProduct')->name('edit-product'); 
Route::post('/new-category/create', 'ShopFormsController@createCategory')->name('create-category');
Route::post('/new-product/create', 'ShopFormsController@createProduct')->name('create-product');
Route::get('logout', 'Auth\LoginController@logout')->name('get-logout');
Route::get('profile', 'UserProfileController@profileUser')->name('profileUser')->middleware('auth');
Route::get('cart', 'ShopCartController@cart')->name('cart')->middleware('auth');
Route::get('/ordering', 'ShopOrderController@ordering')->name('ordering');
Route::post('/create-ordering', 'ShopOrderController@createOrdering')->name('create-order');
Route::post('/add-to-cart', 'ShopCartController@addToCart')->name('add-to-cart'); 
Route::post('/add-to-statistic', 'ShopCartController@addStatistic')->name('add-to-statistic');  /////////////////////                                        ////////////////////
Route::patch('order', 'ShopOrderController@registrationOrder')->name('order-registration');
Route::post('/delet-item/{id}', 'ShopCartController@deleteItem')->name('delete-item');

Route::get('orders', 'ShopOrderController@orders')->name('orders');
Route::get('order/{id}', 'ShopOrderController@order')->name('order');
Route::get('user-orders/{id}', 'ShopOrderController@userOrders')->name('user-orders');
Route::post('status-orders/{id}', 'ShopOrderController@editStatusOrder')->name('edit-status-order');
Route::get('statistics', 'ShopStatisticsController@statistics')->name('statistics');

