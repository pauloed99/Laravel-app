<?php

use Illuminate\Support\Facades\Route;


Route::resource('users', 'UserController');

Route::get('users/{email}/resetPassword', 'UserController@editPassword')->name('password.edit');

Route::put('users/{email}/resetPassword', 'UserController@updatePassword')->name('password.update');

Route::resource('products', 'ProductController');

Route::resource('userProducts', 'UserProductController');

Route::get('', 'LoginController@show')->name('login.show');

Route::post('login', 'LoginController@authenticate')->name('login.authenticate');

Route::get('logout', 'LoginController@logout')->name('logout');

