<?php

Route::get('ajax-city/{state_id}', 'HomeController@ajaxCities')->where('state_id', '[0-9]+');

Auth::routes();

Route::group(['prefix' => 'shoppy'], function () {
    Route::get('dashboard', 'Admin\DashboardController@index');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('users', 'Admin\UserController');
});


