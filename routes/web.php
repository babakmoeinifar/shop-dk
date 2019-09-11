<?php

Route::get('ajax-city/{state_id}', 'HomeController@ajaxCities')->where('state_id', '[0-9]+');

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'shoppy'], function () {
    Route::get('dashboard', 'Admin\DashboardController@index');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('discounts', 'Admin\DiscountController');

    Route::resource('products', 'Admin\ProductController');
    Route::post('add-images-product', 'Admin\ProductController@addImagesProduct');

    Route::post('add-attr-group', 'Admin\AttributeController@addAttrGroup');
    Route::post('add-attribute', 'Admin\AttributeController@addAttribute');
    Route::post('add-attribute-field', 'Admin\AttributeController@addAttributeField');
});

Route::get('/search/{category}/', 'HomeController@category');
Route::get('/search/{category}/{product}', 'HomeController@product');

